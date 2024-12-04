<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SetLocaleController;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/villes', [VilleController::class, 'index'])->name('ville.index');

Route::get('/registration', [UserController::class, 'create'])->name('user.create');

Route::post('/registration', [UserController::class, 'store'])->name('user.store');

Route::get('/login', [AuthController::class, 'create'])->name('login');

Route::post('/login', [AuthController::class, 'store'])->name('login.store');



Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

Route::middleware('auth')->group(function(){

Route::get('/etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');
    Route::get('/etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');
    Route::post('/create/etudiant', [EtudiantController::class, 'store'])->name('etudiant.store');
    Route::get('/edit/etudiant/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');
    Route::put('/edit/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'destroy'])->name('etudiant.delete');
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');
});


Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
Route::get('/fiche', [ProfileController::class, 'create'])->name('profile.create');

Route::post('/fiche', [ProfileController::class, 'fiche'])->name('profile.fiche');
Route::get('/profile/{article}', [ProfileController::class, 'show'])->name('profile.show');
Route::delete('/profile/{article}', [ProfileController::class, 'destroy'])->name('profile.delete');

Route::get('/edit/profile/{article}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/edit/profile/{article}', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/delete/{document}', [DocumentController::class, 'destroy'])->name('document.delete');
