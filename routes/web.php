<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\ContactController;

Route::get("/", [IndexController::class, 'Index'])->name('index');
Route::get("/about.html", [AboutController::class, 'About'])->name('about');
Route::get("/product.html", [ProductController::class, 'Product'])->name('product');
Route::get("/product/{slug}.html", [ProductController::class, 'ProductDetails'])->name('product.details');
Route::get("/portfolio.html", [PortfolioController::class, 'Portfolio'])->name('portfolio');
Route::get('/gallery.html', [GalleryController::class, 'Gallery'])->name('gallery');
Route::get("/blog.html", [BlogController::class, 'Blog'])->name('blog');
Route::get("/blog/{slug}.html", [BlogController::class, 'BlogDetail'])->name('blog.detail');
Route::get("/accessories.html", [AccessoriesController::class, 'Accessories'])->name('accessories');
Route::get("/contact.html", [ContactController::class, 'Contact'])->name('contact');
Route::post('/contact/submit', [ContactController::class, 'ContactSubmit'])->name('contact.submit');