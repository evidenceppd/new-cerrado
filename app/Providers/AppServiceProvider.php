<?php

namespace App\Providers;

use App\Models\Corretor;
use App\Models\Product;
use App\Models\ProductsCategories;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        \Carbon\Carbon::setLocale('pt_BR');

        try {
            DB::connection()->getPdo();

            $categories_geral = ProductsCategories::with(['products', 'comunicado'])->where("type", "seguro_geral")->get();
            $categories_para_empresa = ProductsCategories::with(['products', 'comunicado'])->where("type", "seguro_para_empresa")->get();
            $categories = ProductsCategories::all();
            $corretores = Corretor::where('mostrar', 1)->get();
            $products = Product::all();
            View::share('categories_geral', $categories_geral);
            View::share('categories_para_empresa', $categories_para_empresa);
            View::share('products', $products);
            View::share('categories', $categories);
            View::share('corretores', $corretores);
        } catch (\Exception $e) {
            logger()->error('Erro ao conectar no banco de dados: ' . $e->getMessage());
        }
    }
}
