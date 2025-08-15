<?php

namespace App\Http\Controllers;

use App\Models\ImagesProduct;
use App\Models\Lead;
use App\Models\Product;
use App\Models\ProductsCategories;
use App\Services\AnalyticsService;
use Exception;
use Faker\Core\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with('categories')->orderBy('created_at', 'asc')->paginate(10);
        $downloads = count(Lead::where('typeRegister', 1)->get());
        $views = AnalyticsService::countViewsMonthProducts();
        return view('admin.products.index', compact('products', 'downloads', 'views'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.products.edit');
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

                $file->storeAs('media/product/', $filename, 'public');

                $path = "/storage/media/product/" . $filename;
            }


            $product = Product::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'content' => $request->content,
                'description' => $request->description,
                'main_image' => $path,
                'slug' => Str::slug($request->name) . '-' . time(),
                'sku' => microtime(),
                "published" => isset($request->published) ? 1 : 0,
            ]);

            if ($product) {

                if (isset($request->categorie)) {
                    foreach ($request->categorie as $cat_id) {
                        $cat = ProductsCategories::findOrFail($cat_id);
                        //attach() vincula categoria ao product
                        $product->categories()->attach($cat);
                    }
                }
                if ($request->hasFile('images')) {
                    foreach ($request->images as $image) {
                        $extension = $image->getClientOriginalExtension();
                        $filename = Str::random(40) . '.' . $extension;

                        $image->storeAs('media/blog', $filename, 'public');

                        $path = "/storage/media/blog/" . $filename;

                        ImagesProduct::create([
                            'product_id' => $product->id,
                            'path' => $path
                        ]);
                    }
                }

                return redirect(route('product.index'))->with('success', 'Produto criado com sucesso!');
            }

            return redirect()->back()->with('error', 'Não conseguimos salvar seu produto, tente novamente mais tarde.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Não conseguimos salvar seu produto, tente novamente mais tarde.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->where('published', 1)->with('images')->firstOrFail();

        $products = Product::where('published', 1)->where('slug', '!=',  $slug)->inRandomOrder()->paginate(4);
        AnalyticsService::newView($request, 'product_id', $product->id);

        return view('single-product1', compact('product', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($product)
    {
        $product = Product::with('categories')->findOrFail($product);
        $product->load('categories');

        $product->checked_boxes = $product->categories->pluck('id')->toArray();

        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $product)
    {
        $product = Product::findOrFail($product);

        try {

            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(40) . '.' . $extension;

                $file->storeAs('media/product/', $filename, 'public');

                $path = "/storage/media/product/" . $filename;
            } else {
                $path = $product->main_image;
            }


            $product->user_id = Auth::user()->id;
            $product->name = $request->name;
            $product->content = $request->content;
            $product->description = $request->description;
            $product->main_image = $path;
            $product->sku = microtime();
            $product->published = isset($request->published) ? 1 : 0;

            $product->save();

            if ($product) {
                $product->categories()->detach();
                if (isset($request->categorie)) {
                    foreach ($request->categorie as $cat_id) {
                        $cat = ProductsCategories::findOrFail($cat_id);
                        //attach() vincula categoria ao product
                        $product->categories()->attach($cat);
                    }
                }
                if ($request->hasFile('images')) {
                    foreach ($request->images as $image) {
                        $extension = $image->getClientOriginalExtension();
                        $filename = Str::random(40) . '.' . $extension;

                        $image->storeAs('media/blog', $filename, 'public');

                        $path = "/storage/media/blog/" . $filename;

                        ImagesProduct::create([
                            'product_id' => $product->id,
                            'path' => $path
                        ]);
                    }
                }

                return redirect(route('product.index'))->with('success', 'Produto criado com sucesso!');
            }

            return redirect()->back()->with('error', 'Não conseguimos salvar seu produto, tente novamente mais tarde.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Não conseguimos salvar seu produto, tente novamente mais tarde.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Produto excluído com sucesso!');
    }


    public function uploadImageContent(Request $request)
    {
        $urls = [];

        $uploadedFiles = $request->file('files');

        if ($uploadedFiles) {
            $file = is_array($uploadedFiles) ? $uploadedFiles[0] : $uploadedFiles;

            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;

            $file->storeAs('media/content-product', $filename, 'public');

            $urls[] = [
                'url' => '/storage/media/content-product/' . $filename,
                'name' => basename($filename)
            ];

            return response()->json([
                'success' => true,
                'files' => $urls
            ]);
        }

        return response()->json(['success' => false], 400);
    }

    public function deleteImage(Request $request)
    {
        $path = $request->input('path');

        if ($path && Storage::exists(str_replace('/storage/', 'public/', $path))) {
            $registerDb = ImagesProduct::where('path', $path)->first();
            $registerDb->delete();
            Storage::delete(str_replace('/storage/', 'public/', $path));
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }


    public function search(Request $request)
    {
        $products = Product::where('name', 'like', '%' . $request->busca . '%')->get();
        $downloads = count(Lead::where('typeRegister', 1)->get());
        $views = AnalyticsService::countViewsMonthProducts();
        return view('admin.products.index', compact('products', 'downloads', 'views'));
    }
}
