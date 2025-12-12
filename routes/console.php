<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::resource('blogs', BlogController::class);

// Route::resource('categories', CategoryController::class);

// Auth::routes();

// Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::delete('blog\{blog}\SoftDelete', [BlogController::class, 'softDelete'])->name('softDelete');

// Route::get('blogRestore/{id}', [BlogController::class, 'restoreBlog']);

// Route::get('blogTrached/{id}', [BlogController::class, 'restoreBlog']);


// Route::get('all/SoftDelete/Records', [BlogController::class, 'allSoftDeleteRecords']);

// Route::delete('blog/{id}/Force/Delete', [BlogController::class, 'ForceDelete'])->name('forceDelete');

// Route::post('blog/{id}/add/categories',[BlogController::class, 'add_categories_to_blog'])->name('add_categories_to_blog');

// Route::get('add/favourite/blog/{blog_id}',[BlogController::class,'addToFavorite'])->name('add a favourite blog');




// Route::get('remove/blog/{id}/from/favorite',[BlogController::class,'removeFromFav'])->name('remove');

