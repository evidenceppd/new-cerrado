<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductsCategoriesController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

//Páginas
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/sobre-nos', [SiteController::class, 'aboutUs'])->name('aboutUs');
Route::get('/seguro', [SiteController::class, 'secureItem']);

//Rotas públicas para produtos e single produtos
Route::get('/produto/{slug}', [ProductController::class, 'show'])->name('product.show');

//Rotas públicas para blog e single blog
Route::get('/blog', [SiteController::class, 'blog'])->name('blog');
Route::get('/blog/{url}', [PostController::class, 'show'])->name('blog.show');

//Rotas de categoria
Route::get('/categoria/{slug}', [ProductsCategoriesController::class, 'show'])->name('categories.show');

//Rotas de cadastro de leads
Route::post('/lead/cadastrar-download', [LeadController::class, 'registerDownload']);
Route::post('/lead/enviar-orcamento', [LeadController::class, 'sendOrcamento']);

//Rota de pesquisa
Route::get('/buscar', [SiteController::class, 'search'])->name('search');



//Rotas de administração
Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.index');
Route::redirect('/admin', '/login');
Route::middleware('auth')->prefix('/admin')->group(function () {
    Route::get('/blog', [PostController::class, 'index'])->name('blog.index');

    Route::get('/blog/create', [PostController::class, 'create'])->name('blog.create');
    Route::post('/blog/create', [PostController::class, 'store'])->name('blog.store');

    Route::post('/blog/create/upload-image-content', [PostController::class, 'uploadImageContent'])->name('blog.upload.image-content');

    Route::get('/blog/edit/{id}', [PostController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/edit/{id}', [PostController::class, 'update'])->name('blog.update');
    Route::post('/blog/delete/{id}', [PostController::class, 'destroy'])->name('blog.delete');


    Route::get('/produtos', [ProductController::class, 'index'])->name('product.index');
    Route::get('/produtos/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/produtos/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/produtos/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/produtos/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::post('/produtos/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    Route::post('/produtos/create/upload-image-content', [ProductController::class, 'uploadImageContent'])->name('product.upload.image-content');
    Route::post('/produtos/delete-image', [ProductController::class, 'deleteImage'])->name('image.delete');
    Route::get('/procurar-produtos', [ProductController::class, 'search'])->name('product.search');


    Route::get('/categorias', [ProductsCategoriesController::class, 'index'])->name('categories.index');
    Route::get('/categorias/create', [ProductsCategoriesController::class, 'create'])->name('categories.create');
    Route::post('/categorias/create', [ProductsCategoriesController::class, 'store'])->name('categories.store');
    Route::get('/categorias/edit/{id}', [ProductsCategoriesController::class, 'edit'])->name('categories.edit');
    Route::post('/categorias/edit/{id}', [ProductsCategoriesController::class, 'update'])->name('categories.update');
    Route::post('/categorias/delete/{id}', [ProductsCategoriesController::class, 'destroy'])->name('categories.delete');

    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::get('/leads/edit/{id}', [LeadController::class, 'edit'])->name('leads.edit');
    Route::post('/leads/edit/{id}', [LeadController::class, 'update'])->name('leads.update');
    Route::post('/leads/delete/{id}', [LeadController::class, 'destroy'])->name('leads.delete');

    Route::get('/clientes', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/clientes/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/clientes/create', [CustomerController::class, 'store'])->name('customers.store');
    Route::get('/clientes/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::post('/clientes/edit/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::post('/clientes/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.delete');
});

require __DIR__ . '/auth.php';
