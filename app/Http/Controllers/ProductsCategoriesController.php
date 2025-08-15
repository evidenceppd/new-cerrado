<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\ProductsCategories;
use App\Services\AnalyticsService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ProductsCategories::with(['products', 'analytics' => function ($query) {
            $query->whereMonth('date_analytics_view', now()->month)
                ->whereYear('date_analytics_view', now()->year);
        }])->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.edit');
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

                $file->storeAs('media/categories/', $filename, 'public');

                $path = "/storage/media/categories/" . $filename;
            }

            ProductsCategories::create([
                'name' => $request->name,
                'description' => $request->description,
                'main_image' => $path,
                'slug' => Str::slug($request->name)
            ]);

            return redirect(route('categories.index'))->with('success', 'Categoria criada com sucesso!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Não conseguimos salvar sua categoria, tente novamente mais tarde.');
        }

        return redirect()->back()->with('error', 'Não conseguimos salvar sua categoria, tente novamente mais tarde.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $slug)
    {
        $categorie = ProductsCategories::where('slug', $slug)->with('products')->first();
        AnalyticsService::newView($request, 'categorie_id', $categorie->id);
        return view('categorie-single', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categorie = ProductsCategories::find($id);

        return view('admin.categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorie = ProductsCategories::find($id);

        try {
            if ($request->hasFile('main_image')) {
                $file = $request->file('main_image');
                $extension = $file->getClientOriginalExtension();
                $filename = Str::random(40) . '.' . $extension;

                $file->storeAs('media/categories/', $filename, 'public');

                $path = "/storage/media/categories/" . $filename;
            } else {
                $path = $categorie->main_image;
            }

            $categorie->name = $request->name;
            $categorie->description = $request->description;
            $categorie->main_image = $path;
            $categorie->slug = Str::slug($request->name);
            $categorie->user_id = Auth::user()->id;
            $categorie->save();

            return redirect(route('categories.index'))->with('success', 'Categoria atualizada com sucesso!');
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Não conseguimos atualizar sua categoria, tente novamente mais tarde.');
        }

        return redirect()->back()->with('error', 'Não conseguimos atualizar sua categoria, tente novamente mais tarde.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorie = ProductsCategories::findOrFail($id);
        $categorie->delete();

        return redirect()->route('categories.index')->with('success', 'Post excluído com sucesso!');
    }
}
