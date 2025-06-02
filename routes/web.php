<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgenceController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProprieteController;
use App\Http\Controllers\Auth\AgenceAuthController;

// Page d'accueil
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');



// Auth par défaut (utilisateur simple)
Auth::routes();

// Tableau de bord général (si besoin)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ----------------------------
// AUTH AGENCE
// ----------------------------
Route::get('/agence/login', [AgenceAuthController::class, 'showLoginForm'])->name('agence.login');
Route::post('/agence/login', [AgenceAuthController::class, 'login']);
Route::post('/agence/logout', [AgenceAuthController::class, 'logout'])->name('agence.logout');

Route::middleware(['auth:agence'])->group(function () {
    Route::get('/agence/dashboard', function () {
        return view('agence.index');
    })->name('agence.dashboard');
});
Route::prefix('/agence')->name('agence.')->group(function () {
    Route::get('propriete', [ProprieteController::class, 'index'])->name('propriete.index');
    Route::get('propriete/create', [ProprieteController::class, 'create'])->name('propriete.create');
    Route::post('propriete', [ProprieteController::class, 'store'])->name('propriete.store');
    Route::get('propriete/{id}/edit', [ProprieteController::class, 'edit'])->name('propriete.edit');
    Route::put('propriete/{id}/update', [ProprieteController::class, 'update'])->name('propriete.update');
    Route::delete('propriete/{id}/destroy', [ProprieteController::class, 'destroy'])->name('propriete.destroy');
    
});





// ----------------------------
// AUTH CLIENT
// ----------------------------
Route::prefix('client')->group(function () {
    Route::get('/login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');
    Route::post('/login', [ClientAuthController::class, 'login'])->name('client.login.submit');
    Route::get('/register', [ClientAuthController::class, 'showRegisterForm'])->name('client.register');
    Route::post('/register', [ClientAuthController::class, 'register'])->name('client.register.submit');
    Route::post('/logout', [ClientAuthController::class, 'logout'])->name('client.logout');

    Route::middleware('auth:client')->group(function () {
        Route::get('/dashboard', function () {
            return view('client.dashboard');
        })->name('client.dashboard');
    });
});

// ----------------------------
// ADMIN (AUTH utilisateur normal)
// ----------------------------
Route::controller(AgenceController::class)->middleware(['auth'])->group(function () {
    Route::get('admin/dashbord',function(){return view('admin.index');});
    Route::get('admin/agence', 'index');
    Route::get('admin/agence/create', 'create');
    Route::post('admin/agence/create', 'save');
    Route::get('admin/agence/edit/{id}', 'edit');
    Route::post('admin/agence/edit/{id}', 'update');
    Route::get('admin/agence/delete/{id}', 'delete');
});

// ----------------------------
// GESTION ADMIN CLIENTS ET LOCATIONS
// ----------------------------
Route::resource('clients', ClientController::class)->except('show');
Route::resource('locations', LocationController::class);
Route::get('propriete/{id}/show', [ProprieteController::class, 'show'])->name('client.show');
