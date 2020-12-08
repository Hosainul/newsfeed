<?php

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::post('subscriber', [App\Http\Controllers\SubscriberController::class, 'store'])->name('subscriber.store');

Route::get('contact', [App\Http\Controllers\ContactController::class, 'create'])->name('contact.create');
Route::post('contact', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Route::get('post/{slug}', [App\Http\Controllers\PostController::class, 'details'])->name('post.details');
Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

Route::group(['middleware'=>['auth']], function(){
    Route::post('comment/{id}', [App\Http\Controllers\CommentController::class, 'store'])->name('comment.store');
});

Route::get('/category/{slug}', [App\Http\Controllers\PostController::class, 'postByCategory'])->name('category.posts');
Route::get('/tag/{slug}', [App\Http\Controllers\PostController::class, 'postByTag'])->name('tag.posts');

Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings');
    Route::put('profile-update', [App\Http\Controllers\Admin\SettingsController::class, 'updateprofile'])->name('profile.update');


    Route::resource('slider', '\App\Http\Controllers\Admin\SliderController');
    Route::resource('tag', '\App\Http\Controllers\Admin\TagController');
    Route::resource('category', '\App\Http\Controllers\Admin\CategoryController');
    Route::resource('post', '\App\Http\Controllers\Admin\PostController');
    Route::resource('photography', '\App\Http\Controllers\Admin\PhotographyController');

    Route::get('pending/post', [App\Http\Controllers\Admin\PostController::class, 'pending'])->name('post.pending');
    Route::put('/post/{id}/approve', [App\Http\Controllers\Admin\PostController::class, 'approval'])->name('post.approve');
    
    Route::get('comments',[App\Http\Controllers\Admin\CommentController::class, 'index'])->name('comment.index');
    Route::delete('comments/{id}',[App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('comment.destroy');
    
    Route::get('authors',[App\Http\Controllers\Admin\AuthorController::class, 'index'])->name('author.index');
    Route::delete('authors/{id}',[App\Http\Controllers\Admin\AuthorController::class, 'destroy'])->name('author.destroy');

    Route::get('contact', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contact.index');
    Route::delete('contact/{id}', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contact.destroy');

    Route::get('/subscriber', [App\Http\Controllers\Admin\SubscriberController::class, 'index'])->name('subscriber.index');
    Route::delete('/subscriber/{id}', [App\Http\Controllers\Admin\SubscriberController::class, 'destroy'])->name('subscriber.destroy');
});

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'Author','middleware'=>['auth','author']], function(){
    Route::get('dashboard', [App\Http\Controllers\Author\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('post', '\App\Http\Controllers\Author\PostController');

    Route::resource('photography', '\App\Http\Controllers\Author\PhotographyController');

    Route::get('settings', [App\Http\Controllers\Author\SettingsController::class, 'index'])->name('settings');
    Route::put('profile-update', [App\Http\Controllers\Author\SettingsController::class, 'updateprofile'])->name('profile.update');

    Route::get('comments',[App\Http\Controllers\Author\CommentController::class, 'index'])->name('comment.index');
    Route::delete('comments/{id}',[App\Http\Controllers\Author\CommentController::class, 'destroy'])->name('comment.destroy');

});
