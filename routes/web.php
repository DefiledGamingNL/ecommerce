<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuItemController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use \App\Http\Controllers\PostController;

Route::get('/', function () {
    $post = Post::latest()->first();
    return Inertia::render('Homepage/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'post' => $post

    ]);
})->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});


Route::group(['middleware' => ['role:Super-Admin|admin']], function () {
Route::get('/admin', AdminController::class)->name('admin.index');
Route::resource('posts', PostController::class)->except(['show']);
Route::resource('categories', CategoryController::class);
Route::resource('menus', MenuController::class);
Route::resource('menu-items', MenuItemController::class)->except(['index', 'show', 'create', 'edit']);
Route::resource('pages', PageController::class)->except(['index', 'show']);
Route::resource('users', UserController::class)->except(['show']);
Route::resource('roles', RoleController::class);
Route::resource('permissions', PermissionController::class)->except(['show']);
Route::resource('products', ProductController::class)->except(['show']);

});

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/{page:slug}', [PageController::class, 'show'])->name('pages.show');
