<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ManagementUserController; 


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

// Acara 3
Route::get('/', function () {
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

