<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('blogs', BlogController::class);

Route::middleware('auth')->group(function () {

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('favList',[BlogController::class,'favList'])->name('favList');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::post('blog/{id}/add/categories',[BlogController::class, 'add_categories_to_blog'])->name('add_categories_to_blog');

Route::get('add/favourite/blog/{blog_id}',[BlogController::class,'addToFavorite'])->name('add a favourite blog');


Route::get('remove/blog/{id}/from/favorite',[BlogController::class,'removeFromFav'])->name('remove');

Route::post('filter/{id}',[BlogController::class,'filterByCategoryID'])->name('filterByCategoryID');
});
Route::middleware('Admin')->group(function () {
    Route::get('add/blog',[BlogController::class,'create'])->name('addBlog');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('blog/{blog}/SoftDelete', [BlogController::class, 'softDelete'])->name('softDelete');

        Route::get('blogRestore/{id}', [BlogController::class, 'restoreBlog']);

        //Route::get('blogTrached/{id}', [BlogController::class, 'restoreBlog']);
        Route::resource('categories', CategoryController::class);

        Route::get('all/SoftDelete/Records', [BlogController::class, 'allSoftDeleteRecords']);

        Route::delete('blog/{id}/Force/Delete', [BlogController::class, 'ForceDelete'])->name('forceDelete');

       Route::get('Blogs/softDelete',[BlogController::class,'allSoftDeleteRecords'])->name('allSoftDelete');

         Route::get('Blog/{id}/restore',[BlogController::class,'restoreBlog'])->name('restoreBlog');
});
require __DIR__.'/auth.php';
