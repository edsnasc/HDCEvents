<?php

// use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

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

Route::resource('events', App\Http\Controllers\EventController::class);
Route::get('/', [App\Http\Controllers\EventController::class, 'index']);

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/produtos', function () {

    $busca = request('search');

    return view('products', ['busca' => $busca]);
});

// Route::get('/produtos/{id}', function ($id) {
//     return view('product', ['id' => $id]);
// });

Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('product', ['id' => $id]);
});

