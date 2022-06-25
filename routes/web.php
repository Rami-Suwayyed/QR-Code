<?php

use App\Http\Controllers\QRController;
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
Route::get('/', [QRController::class, 'Simple'])->name('qr_simple');
Route::post('/simple/qrcode', [QrController::class, 'QrCode'])->name('qrcode');

Route::get('/advanced', [QRController::class, 'QrBuilder'])->name('qr_builder');
Route::post('/builder', [QrController::class, 'Builder'])->name('builder');

Route::get('/phone', [QrController::class, 'phone'])->name('qr_phone');
Route::get('/email', [QrController::class, 'email'])->name('qr_email');
Route::get('/geo', [QrController::class, 'geo'])->name('qr_geo');
Route::get('/sms', [QrController::class, 'sms'])->name('qr_sms');



Route::get('/index', [QRController::class, 'index'])->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
