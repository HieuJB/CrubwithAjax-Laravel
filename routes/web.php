<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dataController;

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
Route::get('/index',[dataController::class,'showdata']);
Route::post('/ss',[dataController::class,'add_data_DB'])->name('add.form');
Route::get('/edit/{id}',[dataController::class,'find_id_edit']);
Route::put('/editss',[dataController::class,'edit_data_form'])->name('edit.data');
Route::delete('delete/{id}',[dataController::class,'remove_data_form'])->name('remove_items');