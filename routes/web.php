<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authentication;

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

Route::get('/',[HomeController::class,'index'])->name('front.home');

//Auth

Route::group(['prefix'=>'admin'], function(){
    Route::get('/',[AuthController::class,'admin']);
    Route::get('/login',[AuthController::class,'login'])->name('admin.login');
    Route::post('/login', [AuthController::class,'authenticate']);
    Route::get('/dashboard', [DashboardController::class,'index'])->name('admin.dashboard')->middleware('auth');
    Route::get('/usersetting', [UserSettingController::class,'usersetting'])->name('admin.usersetting')->middleware('auth');
    Route::put('/usersetting/usersettingupdate', [UserSettingController::class,'usersettingupdate'])->name('admin.usersettingupdate')->middleware('auth');
    Route::get('/logout', [AuthController::class,'logout'])->name('admin.logout')->middleware('auth');

    

    //manajemen kategori
    Route::get('/kategori',[KategoriController::class,'daftar'])->name('admin.kategori.daftar')->middleware('auth');
    Route::post('/kategori/add',[KategoriController::class,'save'])->name('admin.kategori.save')->middleware('auth');
    Route::put('/kategori/edit/{id_kategori}',[KategoriController::class,'update'])->name('admin.kategori.update')->middleware('auth');
    Route::delete('/kategori/delete/{id_kategori}',[KategoriController::class,'delete'])->name('admin.kategori.delete')->middleware('auth');

    //manajemen kategori
    Route::get('/status',[StatusController::class,'daftar'])->name('admin.status.daftar')->middleware('auth');
    Route::post('/status/add',[StatusController::class,'save'])->name('admin.status.save')->middleware('auth');
    Route::put('/status/edit/{id_status}',[StatusController::class,'update'])->name('admin.status.update')->middleware('auth');
    Route::delete('/status/delete/{id_status}',[StatusController::class,'delete'])->name('admin.status.delete')->middleware('auth');

    //berita
    //Route::get('/berita',[BeritaController::class,'daftar'])->name('admin.berita.daftar')->middleware('auth');
    //Route::get('/berita/add',[BeritaController::class,'add'])->name('admin.berita.add')->middleware('auth');
    //Route::post('/berita/add',[BeritaController::class,'save'])->name('admin.berita.save')->middleware('auth');
    //Route::get('/berita/edit/{id}',[BeritaController::class,'edit'])->name('admin.berita.edit')->middleware('auth');
    //Route::put('/berita/edit/{id}',[BeritaController::class,'update'])->name('admin.berita.update')->middleware('auth');
    //Route::delete('/berita/delete/{id}',[BeritaController::class,'delete'])->name('admin.berita.delete')->middleware('auth');

    
    
});
/*
Route::post('/master_soal/add', 'MasterSoalController@save')->name('master_soal.save');
*/