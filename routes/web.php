<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
// use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ManagementUserController; 
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\backend\DashboardController;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\PendidikanController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\UploadController;


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

// ACARA 3
Route::get('/', action: function () {
    return view('welcome');
});

Route::get('foo', function () {
    return 'Hello World';
});

// Route::get('user', [UserController::class, 'index']);

Route::match(['get', 'post'], '/match', function () {
    return 'simatch';
});
Route::any('/any', function () {
    return 'siany';
});


Route::permanentRedirect('/here', '/there');

Route::view('/welcome', 'welcome', ['name' => 'Andin']);

// Route::get('user/{name?}', function ($name = null){
//     return $name;
// });
Route::get('user/{name?}', function ($name = 'Andin'){
    return $name;
});

// Route::get('user/{name?}', function ($name){

// })->where('name', '[A-Za-z]+');

Route::get('user/{id}', function ($id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('user/{id}/{name}', function ($id, $name) {
    return "$id - $name";
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Route::get('search/{search}', function ($search) {
    return $search;
})->where('search', '.*');


//Acara 4
// $url = route('profile');

// return redirect()->route('profile');

// Route::get('user/{id}/profile', function ($id) {
    
// })->name('profile');

// $url = route('profile', ['id' => 1]);

// Route::get('user/{id}/profile', function ($id) {
//     //
// })->name('profile');

// $url = route('profile', ['id' => 1, 'photos' => 'yes']);

Route::get('user/profile', function () {
    return "Ini halaman profile";
})->middleware('check.profile')->name('profile');

Route::namespace('Admin')->group(function () {
    // Semua controller dalam grup ini ada di namespace "App\Http\Controllers\Admin"
});
Route::domain('{account}.myapp.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        // Proses data berdasarkan akun dan ID
    });
});
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        // Akan cocok dengan URL "/admin/users"
    });
});
Route::prefix('admin')->group(function () {
    Route::get('users', function () {
        
    })->name('users'); 
});

//Acara 5
Route::get('/user', [ManagementUserController::class, 'index']);
Route::resource('/user','ManagementUserController');

//Acara 6
// Route::get('/home', [ManagementUserController::class, 'index']);

// //Acara 7
// Route::group(['namespace' => 'frontend'], function()
//     {
//         Route::resource('home', 'HomeController');
//     });
// Route::get('/home', [HomeController::class, 'index']);
Route::get('/home', function () {
    return view ('frontend/home');
});

//Acara 8
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

//Acara 11
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

//Acara 13 
Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
});

//Acara 15 dan 16
Route::group(['namespace' => 'App\Http\Controllers\Backend'], function () {
    Route::resource('pendidikan', PendidikanController::class);
});

//Acara 17
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);
Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);
 
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);

//Acara 18 
Route::get('/cobaerror/{nama?}', [CobaController::class, 'index']);

//Acara 19 dan 20
Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');
Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf/store', [UploadController::class, 'pdf_store'])->name('pdf.store');