<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;
use App\Models\ProductsCategories;
use App\Services\AnalyticsService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteController extends Controller
{
    public function  index(Request $request): View
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(4);

        AnalyticsService::newView($request, 'page', 1);
        return view('index', compact('request', 'posts'));
    }

    public function secureGeral()
    {
        $categories_selecionada = ProductsCategories::where('mostrar', 1)->where('type', 'seguro_geral')->get();

        $type = "geral";
        return view('categories', compact('categories_selecionada', 'type'));
    }

    public function secureEmpresa() {
        $categories_selecionada = ProductsCategories::where('mostrar', 1)->where('type', 'seguro_para_empresa')->get();
        $type = "para_empresa";
        return view('categories', compact('categories_selecionada', 'type'));
    }


    public function blog(Request $request)
    {
        AnalyticsService::newView($request, 'page', 3);
        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        return view('blog', compact('posts'));
    }

    public function secureItem(Request $request)
    {
        return view('secure_item');
    }

    public function search(Request $request)
    {
        $search = $request->busca;
        $posts = Post::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        $products = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get();


        return view('search-result', compact('posts', 'products', 'search'));
    }
}
