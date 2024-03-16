<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::post('/login', [UserController::class, 'PostLogin'])->name('PostLogin');

Route::post('/search', [BlogController::class, 'blog_search'])->name('blog.search');

Route::get('/', [HomeController::class, 'Main'])->name('main');

Route::get('/list_category/{blog}', [BlogController::class, 'List_category'])->name('blog.list_category');

Route::get('/list', [BlogController::class, 'blog_list'])->name('blog.list');

Route::get('/admin', [UserController::class, 'FormLogin'])->name('FormLogin');

Route::get('/show/{show}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

Route::post('/send_mail', [ContactController::class, 'send_mail'])->name('send_mail');

Route::post('/comment/{comment}', [CommentController::class, 'comment'])->name('comment');


Route::middleware(['login'])->group(function () {
    Route::get('/home', [HomeController::class, 'Home'])->name('home');
    Route::get('/logout', [UserController::class, 'Logout'])->name('Logout');

    Route::resource('category', CategoryController::class);
    Route::resource('contact', ContactController::class);
    Route::get('/destroy/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

    Route::resource('blog', BlogController::class);

    Route::post('/blog/status', [BlogController::class, 'status'])->name('blog.status');

    Route::get('/trash', [BlogController::class, 'trash'])->name('blog.trash');

    Route::get('/blog/destroy/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::get('/blog/destroy_trash/{blog}', [BlogController::class, 'destroy_trash'])->name('blog.destroy_trash');

    Route::get('/blog/restore/{blog}', [BlogController::class, 'restore'])->name('blog.restore');
});
