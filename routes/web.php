<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MoUController;

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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::resource('posts', 'PostController');

Route::get('memo', 'MoUController@getIndex')->name('mou');
Route::get('memo/{id}', 'MoUController@getSingle')->name('mou.single')/*-> where('docNum', '[\w\d\-\_]+') */;
Route::get('search', 'MoUController@search')->name('search');
Route::get('download/{file}', 'MoUController@download')->name('download');

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
