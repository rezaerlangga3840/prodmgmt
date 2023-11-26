<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BranchesController;
use App\Http\Controllers\GalleryImagesController;
use App\Http\Controllers\BeritaController;
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

    //branches management
    //Route::get('/branches',[BranchesController::class,'daftar'])->name('admin.branches.daftar')->middleware('auth');
    //Route::post('/branches/add',[BranchesController::class,'save'])->name('admin.branches.save')->middleware('auth');
    //Route::put('/branches/edit/{id}', [BranchesController::class,'update'])->name('admin.branches.update')->middleware('auth');
    //Route::delete('/branches/delete/{id}', [BranchesController::class,'delete'])->name('admin.branches.delete')->middleware('auth');

    //images management
    //Route::get('/gallery_images',[GalleryImagesController::class,'daftar'])->name('admin.gallery_images.daftar')->middleware('auth');
    //Route::post('/gallery_images/add',[GalleryImagesController::class,'save'])->name('admin.gallery_images.save')->middleware('auth');
    //Route::put('/gallery_images/edit/{id}',[GalleryImagesController::class,'update'])->name('admin.gallery_images.update')->middleware('auth');
    //Route::delete('/gallery_images/delete/{id}',[GalleryImagesController::class,'delete'])->name('admin.gallery_images.delete')->middleware('auth');

    //berita
    //Route::get('/berita',[BeritaController::class,'daftar'])->name('admin.berita.daftar')->middleware('auth');
    //Route::get('/berita/add',[BeritaController::class,'add'])->name('admin.berita.add')->middleware('auth');
    //Route::post('/berita/add',[BeritaController::class,'save'])->name('admin.berita.save')->middleware('auth');
    //Route::get('/berita/edit/{id}',[BeritaController::class,'edit'])->name('admin.berita.edit')->middleware('auth');
    //Route::put('/berita/edit/{id}',[BeritaController::class,'update'])->name('admin.berita.update')->middleware('auth');
    //Route::delete('/berita/delete/{id}',[BeritaController::class,'delete'])->name('admin.berita.delete')->middleware('auth');

    //manajemen kategori
    
});
/*
Route::post('/master_soal/add', 'MasterSoalController@save')->name('master_soal.save');
*/