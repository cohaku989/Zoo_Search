<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
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
    return view('/account/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

//auth:admin settings
Route::prefix('admin')->name('admin.')->group(function(){
    
     Route::get('/dashboard', function () {
        return view('/admin/account/dashboard');
    })->middleware(['auth:admin', 'verified'])->name('dashboard');
    
    require __DIR__.'/admin.php';
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/myposts', [PostController::class, 'archive'])->name('post.archive');
    Route::get('/myposts/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/myposts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::post('/myposts', [PostController::class, 'store'])->name('post.store');
    Route::put('/myposts/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('/myposts/{post}', [PostController::class, 'delete'])->name('post.delete');
    //myprofile settings
    Route::get('/myprofile', [ProfileController::class, 'archive'])->name('profile.info');
    Route::get('/myprofile/{link}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/myprofile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/myprofile', [ProfileController::class, 'delete'])->name('profile.delete');
    Route::get('/myfavzoos', [ProfileController::class, 'favzoo'])->name("favzoo");
    Route::get('/myfavanimals', [ProfileController::class, 'favanimal'])->name("favanimal");
    
    Route::post('/zoos/like/{id}', [FavzooController::class, 'store']);
    Route::post('/zoos/unlike/{id}', [FavzooController::class, 'destroy']);
    
    Route::post('/zoos/each/like/{id}', [FavanimalController::class, 'store']);
    Route::post('/zoos/each/unlike/{id}', [FavanimalController::class, 'destroy']);
    
    Route::post('/gallery/like/{id}', [LikeController::class, 'store'])->name('like');
    Route::post('/gallery/unlike/{id}', [LikeController::class, 'destroy'])->name('unlike');
    
    Route::get('change-password', [NewPasswordController::class, 'createreset'])
                ->name('password.change');
    Route::post('change-password', [NewPasswordController::class, 'storereset'])
                ->name('password.storereset');
});

Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/admin/zoos', [ZooController::class, 'archive'])->name('zoo.archive');
    Route::get('/admin/zoos/create', [ZooController::class, 'create'])->name('zoo.create');
    Route::get('/admin/zoos/{zoo}/edit', [ZooController::class, 'edit'])->name('zoo.edit');
    Route::post('/admin/zoos', [ZooController::class, 'store'])->name('zoo.store');
    Route::put('/admin/zoos/{zoo}', [ZooController::class, 'update'])->name('zoo.update');
    Route::delete('/admin/zoos/{zoo}', [ZooController::class, 'delete'])->name('zoo.delete');
    //myprofile settings
    Route::get('/admin/profile', [AdminProfileController::class, 'archive'])->name('admin.archive');
    Route::get('/admin/profile/{link}/edit', [AdminProfileController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.update');
    Route::delete('/admin/profile', [AdminProfileController::class, 'delete'])->name('damin.delete');
});

Route::get('/gallery/{post}', [PostController::class, 'show'])->name('gallery.post');
Route::get('/zoos/{zoo}', [ZooController::class, 'show'])->name('zoo.show');
Route::get('/zoos/each/{id}', [ZooController::class, 'each_zoo'])->name('zoo.each');

Route::controller(TopController::class)->group(function(){
    Route::get('/', 'show_place')->name('search.place');
    Route::get('/top_animals', 'show_animals')->name('search.animal');
    Route::get('/top_price', 'show_price')->name('search.price');
});

Route::controller(PageController::class)->group(function(){
    Route::get('/gallery', 'archive')->name('gallery');
    Route::get('/gallery/zoo/{id}', 'each_zoo')->name('gallery.zoo');
    Route::get('/gallery/animal/{id}', 'each_animal')->name('gallery.animal');
    Route::get('/about', 'about')->name('about');
});