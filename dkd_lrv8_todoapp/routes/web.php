<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\TodoController;
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
Route::post('/auth/save', [MainController::class,'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class,'check'])->name('auth.check');
Route::get('/auth/logout',[MainController::class,'logout'])->name('auth.logout');


Route::group(['middleware'=>['AuthCheck']], function(){
    Route::get('/auth/register',[MainController::class,'register'])->name('auth.register');
    Route::get('/auth/login',[MainController::class,'login'])->name('auth.login');
    Route::get('/admin/dashboard',[MainController::class,'dashboard']);
   
    Route::get('/admin/create',[MainController::class,'create']);
    Route::post('/admin/upload',[MainController::class,'upload']);
    Route::get('{id}/admin/edit',[MainController::class,'edit']);
    Route::post('/admin/update',[MainController::class,'update']);
    Route::get('{id}/admin/completed',[MainController::class,'completed']);
    Route::get('{id}/admin/delete',[MainController::class,'delete']);

});
