<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ZooController;
use App\Http\Controllers\TopController;
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
    Route::get('/myposts/{post}', [PostController::class, 'show']);
    Route::get('/myposts/{post}/edit', [PostController::class, 'edit']);
    Route::post('myposts', [PostController::class, 'store']);
    Route::put('/myposts/{post}', [PostController::class, 'update']);
    Route::delete('/myposts/{post}', [PostController::class, 'delete']);
    //myprofile settings
    Route::get('/myprofile', [ProfileController::class, 'archive']);
    Route::get('/myprofile/{link}/edit', [ProfileController::class, 'edit']);
    Route::put('/myprofile', [ProfileController::class, 'update']);
    Route::delete('/myprofile', [ProfileController::class, 'delete']);
    
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

Route::get('/zoos/{zoo}', [ZooController::class, 'show'])->name('zoo.show');

Route::controller(TopController::class)->group(function(){
    Route::get('/', 'show_place');
    Route::get('/top_animals', 'show_animals');
    Route::get('/top_price', 'show_price');
});