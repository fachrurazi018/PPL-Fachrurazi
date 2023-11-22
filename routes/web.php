<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/{umkm}/detail', [DashboardController::class, 'show'])->name('detail');

Route::middleware(['guest'])->group(function(){
    // route dengan methode get dengan nama register dari UserController dan nama method register pada controller dan penamaan route register
    Route::get('register', [UserController::class , 'register'])->name('register');
    // route dengan methode post dengan nama register dari UserController dan nama method register_action pada controller dan penamaan route register.action
    Route::post('register', [UserController::class , 'register_action'])->name('register.action');
    // route dengan methode get dengan nama login dari UserController dan nama method login pada controller dan penamaan route login
    Route::get('login', [UserController::class , 'login'])->name('login');
    // route dengan methode post dengan nama login dari UserController dan nama method login_action pada controller dan penamaan route login.action
    Route::post('login', [UserController::class , 'login_action'])->name('login.action');
});

// route dengan methode get dengan nama password dari UserController dan nama method password pada controller dan penamaan route password
Route::get('password', [UserController::class , 'password'])->name('password');
// route dengan methode post dengan nama password dari UserController dan nama method password_action pada controller dan penamaan route password.action
Route::post('password', [UserController::class , 'password_action'])->name('password.action');
// route dengan methode get dengan nama logout dari UserController dan nama method logout pada controller dan penamaan route logout
Route::post('logout', [UserController::class , 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::middleware(['checkrole:admin'])->group(function(){
        Route::get('/admin', [AdminController::class, 'index'])->name('dashboard_admin');
        Route::get('/admin/umkm', [AdminController::class, 'umkm'])->name('umkm');
        Route::get('/admin/tambahumkm',[AdminController::class, 'tambahumkm'])->name('tambahumkm');
        Route::post('/admin/insertumkm',[AdminController::class, 'insertumkm'])->name('insertumkm');
        Route::get('/admin/tampilkanumkm/{id}',[AdminController::class, 'tampilkanumkm'])->name('tampilkanumkm');
        Route::post('/admin/updateumkm/{id}',[AdminController::class, 'updateumkm'])->name('updateumkm');
        Route::get('/admin/delete/{id}',[AdminController::class, 'delete'])->name('delete');
        
        Route::get('/admin/produk', [AdminController::class, 'produk'])->name('produk');
        Route::get('/admin/tambahproduk',[AdminController::class, 'tambahproduk'])->name('tambahproduk');
        Route::post('/admin/insertproduk',[AdminController::class, 'insertproduk'])->name('insertproduk');
        Route::get('/admin/tampilkanproduk/{id}',[AdminController::class, 'tampilkanproduk'])->name('tampilkanproduk');
        Route::post('/admin/updateproduk/{id}',[AdminController::class, 'updateproduk'])->name('updateproduk');
        Route::get('/admin/deleteproduk/{id}',[AdminController::class, 'deleteproduk'])->name('deleteproduk');
        
        Route::get('/admin/kegiatan', [AdminController::class, 'kegiatan'])->name('kegiatan');
        Route::get('/admin/tambahkegiatan',[AdminController::class, 'tambahkegiatan'])->name('tambahkegiatan');
        Route::post('/admin/insertkegiatan',[AdminController::class, 'insertkegiatan'])->name('insertkegiatan');
        Route::get('/admin/tampilkankegiatan/{id}',[AdminController::class, 'tampilkankegiatan'])->name('tampilkankegiatan');
        Route::post('/admin/updatekegiatan/{id}',[AdminController::class, 'updatekegiatan'])->name('updatekegiatan');
        Route::get('/admin/deletekegiatan/{id}',[AdminController::class, 'deletekegiatan'])->name('deletekegiatan');
        
        Route::get('/admin/pendapatan', [AdminController::class, 'pendapatan'])->name('pendapatan');
        Route::get('/admin/tambahpendapatan',[AdminController::class, 'tambahpendapatan'])->name('tambahpendapatan');
        Route::post('/admin/insertpendapatan',[AdminController::class, 'insertpendapatan'])->name('insertpendapatan');
        Route::get('/admin/tampilkanpendapatan/{id}',[AdminController::class, 'tampilkanpendapatan'])->name('tampilkanpendapatan');
        Route::post('/admin/updatependapatan/{id}',[AdminController::class, 'updatependapatan'])->name('updatependapatan');
        Route::get('/admin/deletependapatan/{id}',[AdminController::class, 'deletependapatan'])->name('deletependapatan');  
    });
});




