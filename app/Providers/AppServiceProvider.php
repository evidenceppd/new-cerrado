<?php

namespace App\Providers;

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

            $categories = ProductsCategories::all();
            $products = Product::all();
            View::share('categories', $categories);
            View::share('products', $products);
        } catch (\Exception $e) {
            logger()->error('Erro ao conectar no banco de dados: ' . $e->getMessage());
        }
    }
}
