<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ZooController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\FavzooController;
use App\Http\Controllers\FavanimalController;
use App\Http\Controllers\LikeController;
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


//auth:users settings
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

//auth:admin settings
Route::prefix('admin')->name('admin.')->group(function(){
    
     Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->middleware(['auth:admin'])->name('dashboard');
    
    require __DIR__.'/admin.php';
});

Route::middleware('auth')->group(function () {
    Route::get('/myposts', [PostController::class, 'archive']);
    Route::get('/myposts/create', [PostController::class, 'create']);
    Route::get('/myposts/{post}/edit', [PostController::class, 'edit']);
    Route::post('/myposts', [PostController::class, 'store']);
    Route::put('/myposts/{post}', [PostController::class, 'update']);
    Route::delete('/myposts/{post}', [PostController::class, 'delete']);
    //myprofile settings
    Route::get('/myprofile', [ProfileController::class, 'archive']);
    Route::get('/myprofile/{link}/edit', [ProfileController::class, 'edit']);
    Route::put('/myprofile', [ProfileController::class, 'update']);
    Route::delete('/myprofile', [ProfileController::class, 'delete']);
    Route::get('/myfavzoos', [ProfileController::class, 'favzoo'])->name("favzoo");
    Route::get('/myfavanimals', [ProfileController::class, 'favanimal'])->name("favanimal");
    
    Route::post('/zoos/like/{id}', [FavzooController::class, 'store']);
    Route::post('/zoos/unlike/{id}', [FavzooController::class, 'destroy']);
    
    Route::post('/zoos/each/like/{id}', [FavanimalController::class, 'store']);
    Route::post('/zoos/each/unlike/{id}', [FavanimalController::class, 'destroy']);
    
    Route::post('/gallery/like/{id}', [LikeController::class, 'store'])->name('like');
    Route::post('/gallery/unlike/{id}', [LikeController::class, 'destroy'])->name('unlike');
    
    // Route::get('change-password', [PasswordResetLinkController::class, 'createreset'])
    //             ->name('password.request');
    // Route::post('reset-password', [NewPasswordController::class, 'storereset'])
    //             ->name('password.update');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/zoos', [ZooController::class, 'archive'])->name('zoo.archive');
    Route::get('/zoos/create', [ZooController::class, 'create'])->name('zoo.create');
    Route::get('/zoos/{zoo}/edit', [ZooController::class, 'edit'])->name('zoo.edit');
    Route::post('zoos', [ZooController::class, 'store']);
    Route::put('/zoos/{zoo}', [ZooController::class, 'update']);
    Route::delete('/zoos/{zoo}', [ZooController::class, 'delete']);
    //myprofile settings
    Route::get('/adminprofile', [AdminProfileController::class, 'archive'])->name('admin.archive');
    Route::get('/adminprofile/{link}/edit', [AdminProfileController::class, 'edit'])->name('admin.edit');
    Route::put('/adminprofile', [AdminProfileController::class, 'update']);
    Route::delete('/adminprofile', [AdminProfileController::class, 'delete']);
});

Route::get('/gallery/{post}', [PostController::class, 'show'])->name('gallery.post');
Route::get('/zoos/{zoo}', [ZooController::class, 'show'])->name('zoo.show');
Route::get('/zoos/each/{id}', [ZooController::class, 'each_zoo'])->name('zoo.each');

Route::controller(TopController::class)->group(function(){
    Route::get('/', 'show_place');
    Route::get('/top_animals', 'show_animals');
    Route::get('/top_price', 'show_price');
});

Route::controller(PageController::class)->group(function(){
    Route::get('/gallery', 'archive')->name('gallery');
    Route::get('/gallery/zoo/{id}', 'each_zoo')->name('gallery.zoo');
    Route::get('/gallery/animal/{id}', 'each_animal')->name('gallery.animal');
});