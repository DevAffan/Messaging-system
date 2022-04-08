<?php

use App\Http\Controllers\MessagesController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [MessagesController::class, 'index'])->name('home');
Route::get('/create/{id?}/{subject?}', [MessagesController::class, 'create'])->name('messsage.create');
Route::post('/message/store', [MessagesController::class, 'store'])->name('messsage.store');
Route::get('/message/{id}', [MessagesController::class, 'show'])->name('messsage.show');
Route::get('/sent', [MessagesController::class, 'sent'])->name('messsage.sent');
