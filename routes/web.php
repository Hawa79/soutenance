<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\Admin\AgenceController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProprieteController;
use App\Http\Controllers\Auth\AgenceAuthController;

// Page d'accueil
Route::get('/', [AccueilController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Auth routes classiques Laravel
Auth::routes();

// Route de connexion standard (login pour utilisateur classique)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout',  [LoginController::class, 'logout'])->name('logout');

// ----------------------------
// AUTH AGENCE
// ----------------------------
Route::get('/agence/login', [AgenceAuthController::class, 'showLoginForm'])->name('agence.login');
Route::post('/agence/login', [AgenceAuthController::class, 'login']);
Route::post('/agence/logout', [AgenceAuthController::class, 'logout'])->name('agence.logout');

Route::middleware(['auth', 'user-access:agence'])->group(function () {
    Route::get('/agence/dashboard', function () {
        return view('agence.index');
    })->name('agence.dashboard');

    Route::prefix('/agence')->name('agence.')->group(function () {
        Route::get('propriete', [ProprieteController::class, 'index'])->name('propriete.index');
        Route::get('propriete/create', [ProprieteController::class, 'create'])->name('propriete.create');
        Route::post('propriete', [ProprieteController::class, 'store'])->name('propriete.store');
        Route::get('propriete/{id}/edit', [ProprieteController::class, 'edit'])->name('propriete.edit');
        Route::put('propriete/{id}/update', [ProprieteController::class, 'update'])->name('propriete.update');
        Route::delete('propriete/{id}/destroy', [ProprieteController::class, 'destroy'])->name('propriete.destroy');
    });
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
});

Route::middleware(['auth', 'user-access:client'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('client.dashboard');
});

// ----------------------------
// ADMIN
// ----------------------------
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

   Route::controller(AgenceController::class)->group(function () {
    Route::get('admin/agence', 'index')->name('admin.agence.index');
    Route::get('admin/agence/create', 'create')->name('admin.agence.create');
    Route::post('admin/agence/create', 'save')->name('admin.agence.store');
    Route::get('admin/agence/edit/{id}', 'edit')->name('admin.agence.edit');
    Route::post('admin/agence/edit/{id}', 'update')->name('admin.agence.update');
    Route::get('admin/agence/delete/{id}', 'delete')->name('admin.agence.delete');
});

});

// ----------------------------
// GESTION CLIENTS ET LOCATIONS (Admin)
// ----------------------------
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('clients', ClientController::class)->except('show');
    Route::resource('locations', LocationController::class);
    Route::get('propriete/{id}/show', [ProprieteController::class, 'show'])->name('client.show');
});
