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

Route::get('/', [\App\Http\Controllers\FrontController::class, 'index'])->name('index');
Route::get('/list1', [\App\Http\Controllers\FrontController::class, 'list1'])->name('list1');
Route::get('/list2', [\App\Http\Controllers\FrontController::class, 'list2'])->name('list2');
Route::get('/list3', [\App\Http\Controllers\FrontController::class, 'list3'])->name('list3');
Route::get('/list4', [\App\Http\Controllers\FrontController::class, 'list4'])->name('list4');
Route::get('/list5', [\App\Http\Controllers\FrontController::class, 'list5'])->name('list5');
Route::get('/list6', [\App\Http\Controllers\FrontController::class, 'list6'])->name('list6');
Route::get('/content/{id}', [\App\Http\Controllers\FrontController::class, 'content'])->name('content');
Route::get('/search', [\App\Http\Controllers\FrontController::class, 'search'])->name('search');

Route::group([['middleware' => 'auth'], 'prefix' => 'admin' ] , function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/category', [\App\Http\Controllers\AdminController::class, 'indexCategory'])->name('admin.indexCategory');
    Route::get('/category/create', [\App\Http\Controllers\AdminController::class, 'createCategory'])->name('admin.createCategory');
    Route::post('/category/create', [\App\Http\Controllers\AdminController::class, 'storeCategory'])->name('admin.storeCategory');
    Route::get('/category/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editCategory'])->name('admin.editCategory');
    Route::patch('/category/edit/{id}', [\App\Http\Controllers\AdminController::class, 'updateCategory'])->name('admin.updateCategory');
    Route::delete('/category/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('admin.deleteCategory');
    Route::get('/content/create', [\App\Http\Controllers\AdminController::class, 'createContent'])->name('admin.createContent');
    Route::post('/content/create', [\App\Http\Controllers\AdminController::class, 'storeContent'])->name('admin.storeContent');
    Route::get('/content/edit/{id}', [\App\Http\Controllers\AdminController::class, 'editContent'])->name('admin.editContent');
    Route::patch('/content/edit/{id}', [\App\Http\Controllers\AdminController::class, 'updateContent'])->name('admin.updateContent');
    Route::delete('/content/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteContent'])->name('admin.deleteContent');
});

require __DIR__.'/auth.php';
