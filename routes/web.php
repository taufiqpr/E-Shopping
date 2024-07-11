<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HitungSawController;
use App\Http\Controllers\HasilHitung;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::get('/home', [HomeController::class, 'dashboard'])->name('dashboard');
Route::get('/user', [HomeController::class, 'index'])->name('index');
Route::get('/create', [HomeController::class, 'create'])->name('user.create');
Route::post('/store', [HomeController::class, 'store'])->name('user.store');
Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

Route::get('/clientside', [DataTableController::class, 'clientside'])->name('clientside');
Route::get('/serverside', [DataTableController::class, 'serverside'])->name('serverside');

Route::get('/login-google', [HomeController::class, 'login_google'])->name('login-google');
Route::get('/google/redirect', [HomeController::class, 'redirect'])->name('google.redirect');
Route::get('/google/callback', [HomeController::class, 'callback'])->name('google.callback');
Route::get('/landing', [HomeController::class, 'landing'])->name('home.landing');

Route::get('/forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('/forgot-password-act', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');
Route::get('/validasi-forgot-password/{token}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria');
Route::get('/create/kriteria', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::post('/store/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
Route::get('/edit/kriteria/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
Route::put('/update/kriteria/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
Route::delete('/delete/kriteria/{id}', [KriteriaController::class, 'delete'])->name('kriteria.delete');

Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif');
Route::get('/create/alternatif', [AlternatifController::class, 'create'])->name('alternatif.create');
Route::post('/store/alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
Route::get('/edit/alternatif/{id}', [AlternatifController::class, 'edit'])->name('alternatif.edit');
Route::put('/update/alternatif/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::delete('/delete/alternatif/{id}', [AlternatifController::class, 'delete'])->name('alternatif.delete');

Route::get('/hasil', [HitungSawController::class, 'hasil'])->name('hasilHitung');