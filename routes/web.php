<?php

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
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

// Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::group(['middleware' => ['guest']], function() {
    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/email/verify', [VerificationController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');
});

Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            Route::get('/import', [CreateController::class, 'importView']);
            Route::post('/importdata', [CreateController::class, 'import']);
            Route::get('/exportIn', [CreateController::class, 'exportIn']);
            Route::get('/exportOut', [CreateController::class, 'exportOut']);
    });
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [RegisterController::class, 'index'])->name('registerView');

Route::post('/register', [RegisterController::class, 'create'])->name('register');

Route::get('/logout',function () {
    Auth::logout();
    return redirect('/');
});

Route::get('/', [PostController::class, 'showAll'])->name('dashboard');

Route::get('/admin.item', [PostController::class, 'showAll']);

Route::get('/admin.item/search', [PostController::class, 'search']);

Route::get('/admin.item/edit{post:id}', [CreateController::class, 'edit']);

Route::post('/admin.item/update{post:id}', [CreateController::class, 'update']);

Route::get('/admin.item/delete{post:id}', [CreateController::class, 'destroy']);

Route::get('/admin.itemOut/forcedelete{post:id}', [CreateController::class, 'forceDestroy']);

Route::get('/admin.itemOut/restore{post:id}', [CreateController::class, 'restore']);

Route::get('/admin.itemIn', [PostController::class, 'showIn']);

Route::get('/admin.itemIn/filter', [PostController::class, 'filterIn']);

Route::get('/admin.itemOut/filter', [PostController::class, 'filterOut']);

Route::get('/admin.item/{post:slug}', [PostController::class, 'showItem']);

Route::get('/admin.itemIn/create', [CreateController::class, 'create']);

Route::get('/admin.itemIn/createSlug', [CreateController::class, 'checkSlug']);

Route::post('/admin.itemIn/save', [CreateController::class, 'store']);

Route::get('/admin.itemOut', [CreateController::class, 'history']);

Route::get('/admin.itemOut/{post:slug}', [CreateController::class, 'showHistory']);

Route::get('/userprofile{user:id}', [CreateController::class, 'userEdit']);

Route::post('/userprofile/update{user:id}', [CreateController::class, 'userUpdate']);
