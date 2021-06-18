<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
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

Route::get('/',[ClientesController::class, 'index']);

Route::get('/cadastro',[ClientesController::class, 'create']);
Route::post('/cadastro',[ClientesController::class, 'store']);

Route::get('/editar/{id}',[ClientesController::class, 'edit']);
Route::post('/update/{id}',[ClientesController::class, 'update']);
Route::post('/delete/{id}',[ClientesController::class, 'delete']);



