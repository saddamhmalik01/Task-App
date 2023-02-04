<?php

use App\Models\Tasks;
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
Route::controller(\App\Http\Controllers\TaskController::class)
    ->group(function () {
        Route::get('/','index');
        Route::post('/', 'index');
        Route::get('/view/{id}','getTaskDetails');
        Route::get('/edit/{id}','edit');
        Route::post('/update/{id}', 'update');
        Route::get('/delete/{id}','destroy');
        Route::get('/create_task','create');
        Route::post('/store', 'store');

    });

