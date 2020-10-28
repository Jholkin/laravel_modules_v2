<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PluginController;

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
    return view('welcome');
});

Route::get('/info', function() {
    return "<h1>Bienvenido extraño, Este es el core del microkernel poderoso....!!!</h1>";
});

Route::get('/plugins', function() {
    return view('plugins');
});

Route::post('/plugins', [PluginController::class, 'save']);