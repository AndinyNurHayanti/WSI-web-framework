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
