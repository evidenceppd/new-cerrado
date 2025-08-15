<?php

namespace App\Http\Controllers;

use App\Models\Analytics;
use App\Models\Post;
use App\Services\AnalyticsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('analytics')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(40) . '.' . $extension;

                $file->storeAs('media/blog', $filename, 'public');

                $path = "/storage/media/blog/" . $filename;
            } else {
                $path = null;
            }

            Post::create([
                "title" => $request->title,
                "content" => $request->content,
                'user_id' => Auth::user()->id,
                "published" => isset($request->published) ? 1 : 0,
                'url' => Str::slug($request->title),
                'main_image' => $path,
                'author' => isset($request->author) ? $request->author : Auth::user()->name,
                'tags' => null
            ]);

            return redirect(route('blog.index'))->with('success', 'Postagem criada com sucesso!');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Não conseguimos salvar sua postagem, tente novamente mais tarde.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $url)
    {
        $post = Post::where('url', $url)->where('published', 1)->firstOrFail();
        $posts = Post::where('url', '!=', $url)->where('published', 1)->orderBy('created_at', 'desc')->paginate(4);

        AnalyticsService::newView($request, 'post_id', $post->id);
        return view('single-blog', compact('post', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(40) . '.' . $extension;

                $file->storeAs('media/blog', $filename, 'public');

                $path = "/storage/media/blog/" . $filename;
            } else {
                $path = $request->main_image_existing;
            }

            $post = Post::where('id', $id)->first();

            $post->title = $request->title;
            $post->content = $request->content;
            $post->user_id = Auth::user()->id;
            $post->published = isset($request->published) ? 1 : 0;
            $post->url = Str::slug($request->title);
            $post->main_image = $path;
            $post->author = isset($request->author) ? $request->author : Auth::user()->name;

            $post->save();

            return redirect(route('blog.index'))->with('success', 'Postagem Atualizada com sucesso!');
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Não conseguimos salvar sua postagem, tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('blog.index')->with('success', 'Post excluído com sucesso!');
    }

    public function uploadImageContent(Request $request)
    {
        $urls = [];

        $uploadedFiles = $request->file('files');

        if ($uploadedFiles) {
            $file = is_array($uploadedFiles) ? $uploadedFiles[0] : $uploadedFiles;

            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;

            $file->storeAs('media/content-blog', $filename, 'public');

            $urls[] = [
                'url' => '/storage/media/content-blog/' . $filename,
                'name' => basename($filename)
            ];

            return response()->json([
                'success' => true,
                'files' => $urls
            ]);
        }

        return response()->json(['success' => false], 400);
    }
}
