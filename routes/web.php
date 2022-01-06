<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\FrontEndController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/about-us', 'about-us');
Route::view('/contact-us', 'contact-us');
Route::view('/checkout', 'checkout');
Route::view('/delivery-and-returns', 'delivery-returns');
Route::view('/our-collections', 'collections')->name('our-collections');
Route::view('/basket', 'cart')->name('cart');
Route::view('/about-product', 'product-desc');
Route::view('/products', 'products');

Route::get('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('dashboard');

// Routes for Front End
Route::get('/', [FrontEndController::class, 'index'])->name('/');
Route::get('/products', [FrontEndController::class, 'products'])->name('products');
Route::get('/product/{slug}', [FrontEndController::class, 'product_description'])->name('product');
Route::get('/our-blogs', [FrontEndController::class, 'blogs'])->name('blogs');
Route::get('/our-blogs/{slug}', [FrontEndController::class, 'blog_description'])->name('blog');
Route::get('/categery-wise-posts/{name}', [FrontEndController::class, 'categoryWisePosts'])->name('posts');
// Routes for Admin Panel

// For Category
Route::get('/admin/all-categories', [CategoryController::class, 'show'])->name('all-categories');
Route::post('/admin/submit-category', [CategoryController::class, 'store'])->name('submit-category');
Route::get('/admin/add-new-category', [CategoryController::class, 'index'])->name('add-categories');
Route::get('/admin/edit-category/{id}', [CategoryController::class, 'edit']);
Route::post('/admin/update-category/{id}', [CategoryController::class, 'update']);
Route::post('/admin/delete-category', [CategoryController::class, 'destroy'])->name('delete-category');

// For Product
Route::get('/admin/all-products', [ProductController::class, 'show'])->name('all-products');
Route::post('/admin/submit-product', [ProductController::class, 'store'])->name('submit-product');
Route::get('/admin/add-new-product', [ProductController::class, 'index'])->name('add-product');
Route::get('/admin/edit-product/{id}', [ProductController::class, 'edit']);
Route::post('/admin/update-product/{id}', [ProductController::class, 'update']);
Route::post('/admin/delete-product', [ProductController::class, 'destroy'])->name('delete-product');
Route::get('/admin/remove-product-image/{id}', [ProductController::class, 'removeImg']);
Route::post('/admin/get-subcategories', [ProductController::class, 'get_subcategories']);

// For Blog Categories
Route::get('/admin/blog-categories', [BlogCategoryController::class, 'show'])->name('blog-categories');
Route::get('/admin/add-blog-categories', [BlogCategoryController::class, 'index'])->name('add-blog-category');
Route::post('/admin/submit-blog-category', [BlogCategoryController::class, 'store'])->name('submit-blog-category');
Route::get('/admin/edit-blog-category/{id}', [BlogCategoryController::class, 'edit']);
Route::post('/admin/update-blog-category/{id}', [BlogCategoryController::class, 'update']);
Route::post('/admin/delete-blog-category', [BlogCategoryController::class, 'destroy'])->name('delete-blog-category');

// For Blogs
Route::get('/admin/all-blogs', [BlogController::class, 'show'])->name('all-blogs');
Route::post('/admin/submit-blog', [BlogController::class, 'store'])->name('submit-blog');
Route::get('/admin/add-new-blog', [BlogController::class, 'index'])->name('add-blog');
Route::get('/admin/edit-blog/{id}', [BlogController::class, 'edit']);
Route::post('/admin/update-blog/{id}', [BlogController::class, 'update']);
Route::post('/admin/delete-blog', [BlogController::class, 'destroy'])->name('delete-blog');
