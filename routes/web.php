<?php
use App\Http\Controllers\Admin\ProprieteController;
use App\Http\Controllers\Admin\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AgenceMiddleware;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AgenceController;
use App\Http\Controllers\Auth\AgenceAuthController;
use App\Models\Propriete;

Route::get('/', function () {
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/login', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('home');

Route::controller(AgenceController::class)->middleware(['auth'])->group(function(){
    Route::get('admin/agence', 'index');
    Route::get('admin/agence/create', 'create');
    Route::post('admin/agence/create', 'save');
    Route::get('admin/agence/edit/{id}', 'edit');
    Route::post('admin/agence/edit/{id}', 'update');
    Route::get('admin/agence/delete/{id}', 'delete');
});

// Routes d'authentification pour l'Agence
Route::get('/agence/login', [AgenceAuthController::class, 'showLoginForm'])->name('agence.login');
Route::post('/agence/login', [AgenceAuthController::class, 'login']);
Route::post('/agence/logout', [AgenceAuthController::class, 'logout'])->name('agence.logout');

Route::middleware('auth:agence')->group(function () {
    Route::get('/agence/dashboard', function () {
        return view('agence.index'); // 🔥 Mets le bon chemin ici
    })->name('agence.dashboard');

});
Route::post('/agence/logout', [AgenceAuthController::class, 'logout'])->name('agence.logout');







Route::prefix('admin/agence')->name('admin.agence.')->group(function () {
Route::resource('propriete', ProprieteController::class)->except('show');
    
});
Route::resource('clients', ClientController::class)->except('show');
Route::resource('clients', App\Http\Controllers\admin\ClientController::class);
Route::resource('locations', App\Http\Controllers\admin\ClientController::class);