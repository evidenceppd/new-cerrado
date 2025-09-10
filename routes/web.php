<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CorretorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsCategoriesController;
use App\Http\Controllers\SiteController;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;

//Páginas
Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('/seguros', [SiteController::class, 'secureGeral']);
Route::get('/seguros-empresas', [SiteController::class, 'secureEmpresa']);
Route::get('/consorcios', [SiteController::class, 'consorcios']);

Route::get('/termos-e-condicoes', [SiteController::class, 'terms'])->name('terms');

//Rotas públicas para produtos e single produtos
Route::get('/seguro/{slug}', [ProductController::class, 'show'])->name('product.show');

//Rotas públicas para blog e single blog
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/blog/{url}', [PostController::class, 'show'])->name('blog.show');

//Rotas de cadastro de leads

Route::post('/enviar-contato/enviar', [LeadController::class, 'sendOrcamento'])->name('enviarContato');
Route::post('/enviar-contato-consorcio/enviar', [LeadController::class, 'sendConsorcio'])->name('enviarContatoConsorcio');

//Rotas de categoria
Route::get('/seguros/{slug}', [ProductsCategoriesController::class, 'show'])->name('categories.show');

//Rota de pesquisa
Route::get('/buscar', [SiteController::class, 'search'])->name('search');



//Rotas de administração
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.index');
Route::redirect('/admin', '/login');
Route::middleware('auth')->prefix('/admin')->group(function () {

    Route::get('/seguros', [ProductController::class, 'index'])->name('product.index');
    Route::get('/seguros/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/seguros/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/seguros/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/seguros/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/seguros/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::post('/seguros/create/upload-image-content', [ProductController::class, 'uploadImageContent'])->name('product.upload.image-content');
    Route::post('/seguros/delete-image', [ProductController::class, 'deleteImage'])->name('image.delete');
    Route::get('/procurar-seguros', [ProductController::class, 'search'])->name('product.search');


    Route::get('/categorias', [ProductsCategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categorias/create', [ProductsCategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categorias/create', [ProductsCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categorias/edit/{id}', [ProductsCategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('/categorias/edit/{id}', [ProductsCategoriesController::class, 'update'])->name('categories.update');
    Route::post('/categorias/delete/{id}', [ProductsCategoriesController::class, 'destroy'])->name('categories.delete');

    Route::get('/banners', [BannerController::class, 'index'])->name('banner.index');
    Route::get('/banners/create', [BannerController::class, 'create'])->name('banner.create');
    Route::post('/banners/create', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/banners/edit/{id}', [BannerController::class, 'edit'])->name('banner.edit');
    Route::post('/banners/edit/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::post('/banners/delete/{id}', [BannerController::class, 'destroy'])->name('banner.delete');

    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/edit/{id}', [LeadController::class, 'edit'])->name('leads.edit');
    Route::post('/leads/edit/{id}', [LeadController::class, 'update'])->name('leads.update');
    Route::post('/leads/delete/{id}', [LeadController::class, 'destroy'])->name('leads.delete');

    Route::get('/corretores', [CorretorController::class, 'index'])->name('corretores.index');
    Route::get('/corretores/create', [CorretorController::class, 'create'])->name('corretores.create');
    Route::post('/corretores/create', [CorretorController::class, 'store'])->name('corretores.store');
    Route::get('/corretores/edit/{id}', [CorretorController::class, 'edit'])->name('corretores.edit');
    Route::post('/corretores/edit/{id}', [CorretorController::class, 'update'])->name('corretores.update');
    Route::post('/corretores/delete/{id}', [CorretorController::class, 'destroy'])->name('corretores.delete');
});

require __DIR__ . '/auth.php';
