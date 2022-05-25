<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\FrontController;

Route::get('/',[FrontController::class,'index'])->name('home');
Route::get('/category/{id}',[FrontController::class,'category'])->name('category');
Route::get('/post/{id}',[FrontController::class,'post'])->name('post');
Route::get('/contact',[FrontController::class,'contact'])->name('contact');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){

   Route::get('/add-category', [CategoryController::class, 'addCategory'])->name('add-category');
   Route::post('/new-category', [CategoryController::class, 'newCategory'])->name('new-category');
   Route::get('/manage-category', [CategoryController::class,'manageCategory'])->name('manage-category');
   Route::post('/update-category/{id}', [CategoryController::class,'updateCategory'])->name('update-category');
   Route::get('/edit-category/{id}', [CategoryController::class,'editCategory'])->name('edit-category');
   Route::get('/delete-category/{id}', [CategoryController::class,'deleteCategory'])->name('delete-category');

   Route::get('/add-tag', [TagController::class, 'addTag'])->name('add-tag');
   Route::post('/new-tag', [TagController::class, 'newTag'])->name('new-tag');
   Route::get('/manage-tag', [TagController::class,'manageTag'])->name('manage-tag');
   Route::post('/update-tag/{id}', [TagController::class,'updateTag'])->name('update-tag');
   Route::get('/edit-tag/{id}', [TagController::class,'editTag'])->name('edit-tag');
   Route::get('/delete-tag/{id}', [TagController::class,'deleteTag'])->name('delete-tag');

   Route::get('/add-post', [PostController::class, 'addPost'])->name('add-post');
   Route::post('/new-post', [PostController::class, 'newPost'])->name('new-post');
   Route::get('/manage-post', [PostController::class, 'managePost'])->name('manage-post');
   Route::post('/update-post/{id}', [PostController::class, 'updatePost'])->name('update-post');
   Route::get('/edit-post/{id}', [PostController::class, 'editPost'])->name('edit-post');
   Route::get('/delete-post/{id}', [PostController::class, 'deletePost'])->name('delete-post');

   Route::get('/add-contact', [ContactController::class, 'addContact'])->name('add-contact');
   Route::post('/new-contact', [ContactController::class, 'newContact'])->name('new-contact');
   Route::get('/manage-contact', [ContactController::class, 'manageContact'])->name('manage-contact');
   Route::post('/update-contact/{id}', [ContactController::class, 'updateContact'])->name('update-contact');
   Route::get('/edit-contact/{id}', [ContactController::class, 'editContact'])->name('edit-contact');
   Route::get('/delete-contact/{id}', [ContactController::class, 'deleteContact'])->name('delete-contact');


});
