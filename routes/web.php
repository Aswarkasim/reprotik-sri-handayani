<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminBannerController;
use App\Http\Controllers\AdminCategoryPostController;
use App\Http\Controllers\AdminConfigurationController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminPanduanController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminVideoController;
use App\Http\Controllers\HomeProjectController;

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

Route::get('/', [HomeController::class, 'index']);



Route::prefix('/admin/auth')->group(function () {
    Route::get('/', [AdminAuthController::class, 'index'])->middleware('guest');
    Route::post('/login', [AdminAuthController::class, 'login']);


    Route::get('/logout', [AdminAuthController::class, 'logout']);
});


Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $data = [
            'content' => 'admin/dashboard/index'
        ];
        return view('admin/layouts/wrapper', $data);
    });

    Route::resource('/user', AdminUserController::class);

    Route::get('/konfigurasi', [AdminConfigurationController::class, 'index']);
    Route::get('/project/download', [AdminProjectController::class, 'download']);
    Route::put('/konfigurasi/update', [AdminConfigurationController::class, 'update']);

    Route::resource('/panduan', AdminPanduanController::class);
    Route::resource('/video', AdminVideoController::class);
    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/project', AdminProjectController::class);
    Route::resource('/banner', AdminBannerController::class);


    Route::prefix('/posts')->group(function () {
        Route::resource('/post', AdminPostController::class);
        Route::resource('/kategori', AdminCategoryPostController::class);
    });
});

Route::prefix('/home')->group(function () {
    Route::get('/project/download', [HomeProjectController::class, 'download']);
    Route::get('/project/show/{id}', [HomeProjectController::class, 'show']);
    Route::get('/project', [HomeProjectController::class, 'index']);
    Route::get('/register', [AdminAuthController::class, 'register']);
    Route::post('/register', [AdminAuthController::class, 'doRegister']);
});
