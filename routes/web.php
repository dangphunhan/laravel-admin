<?php

use App\DataTables\PostsDataTable;
use App\Http\Controllers\MyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DatatableController;
use Illuminate\Support\Facades\Auth;
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
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [MyController::class, 'GetAllPost']);
Route::get('postDetail/{slug}', [MyController::class, 'postDetail'])->name('post.detail');

Route::get('register', [UserController::class, 'register'])->name('register');
Route::post('register', [UserController::class, 'register_action'])->name('register.action');

Route::middleware(['guest'])->group(function () {
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('login', [UserController::class, 'login_action'])->name('login.action');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('post', PostController::class);
    Route::get('logout', [UserController::class, 'signOut'])->name('logout');
    Route::get('admin', [PostController::class, 'index'])->name('admin');
    Route::get('list-user', [UserController::class, 'showAll'])->name('list-user');
    Route::get('password', [UserController::class, 'changePassword'])->name('password');
    Route::post('changepassword', [UserController::class, 'passwordUpdate'])->name('password.update');
    Route::get('profile/{id}', [UserController::class, 'profile'])->name('profile');
    Route::get('profile/{id}/edit', [UserController::class, 'editProfile'])->name('edit.profile');
    Route::put('profile/{id}', [UserController::class, 'updateProfile'])->name('update.profile');
    Route::get('destroy/{id}', [PostController::class, 'delete']);


    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');

    Route::any('/ckfinder/examples/{example?}', 'CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
        ->name('ckfinder_examples');
});