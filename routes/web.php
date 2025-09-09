<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\DemandeController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ReponseController;
use App\Http\Controllers\Agence\AgenceController;
use App\Http\Controllers\Agence\ProfilController;
use App\Http\Controllers\Admin\ActiviteController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\admin\PaiementController;
use App\Http\Controllers\Admin\ParametreController;
use App\Http\Controllers\Admin\ProprieteController;
use App\Http\Controllers\Auth\AgenceAuthController;
use App\Http\Controllers\Admin\AdminAgenceController;
use App\Http\Controllers\Admin\AdminClientController;
use App\Http\Controllers\Admin\TransactionController;

use App\Http\Controllers\Agence\NotificationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProprieteController;
use App\Http\Controllers\Agence\AgenceDashboardController;





// Page d'accueil
Route::get('/', [AccueilController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [AccueilController::class, 'index'])->name('accueil');
Route::get('/propriete/{id}', [ProprieteController::class, 'show'])->name('propriete.show');


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
Route::post('/admin/agences/save', [AgenceController::class, 'save'])->name('admin.agence.save');
Route::get('/admin/agence/info', [AgenceController::class, 'info'])
    ->name('admin.agence.info');
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
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('profils', ProfilController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('client/profil', [ClientController::class, 'profil'])->name('client.profil');
Route::put('client/{id}/update', [ClientController::class, 'update'])->name('client.update');
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
    Route::get('/dashboard', [HomeController::class, 'index'])->name('acceuil');
});
Route::get('/admin/agence/index', [AgenceController::class, 'index'])->name('admin.agence.index');
Route::get('/agence', [AgenceController::class, 'index'])->name('agence.index');

// ----------------------------
// ADMIN
// ----------------------------
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/utilisateur', [UserController::class, 'index'])->name('admin.utilisateur.index');
    Route::post('/utilisateur/activer/{id}', [UserController::class, 'activer'])->name('admin.utilisateur.activer');
    Route::post('/utilisateur/desactiver/{id}', [UserController::class, 'desactiver'])->name('admin.utilisateur.desactiver');
    Route::delete('/utilisateur/supprimer/{id}', [UserController::class, 'supprimer'])->name('admin.utilisateur.supprimer');
});

Route::controller(AgenceController::class)->group(function () {
    Route::get('admin/agence', 'index')->name('admin.agence.index');
    Route::get('admin/agence/create', 'create')->name('admin.agence.create');
    Route::get('admin/agence/{id}', 'show')->name('admin.agence.show');
    Route::post('admin/agence/create', 'save')->name('admin.agence.store');
    Route::get('admin/agence/edit/{id}', 'edit')->name('admin.agence.edit');
    Route::put('admin/agence/edit/{id}', [AgenceController::class, 'update']);

Route::prefix('admin')->name('admin.')->middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/agences/{id}', [AdminAgenceController::class, 'show'])->name('agence.show');
});
Route::put('/agence/paiements/{paiement}/valider', [PaiementController::class,'valider'])->name('agence.paiements.valider');
Route::put('/agence/paiements/{paiement}/refuser', [PaiementController::class,'refuser'])->name('agence.paiements.refuser');


    Route::get('admin/agence/delete/{id}', 'delete')->name('admin.agence.delete');
});
Route::middleware(['auth'])->group(function () {
    Route::put('/client/update-profil', [ClientController::class, 'updateProfil'])->name('client.update.profil');
    Route::put('/client/update-password', [ClientController::class, 'updatePassword'])->name('client.update.password');
});
// ----------------------------
// GESTION CLIENTS ET LOCATIONS (Admin)
// ----------------------------
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::resource('client', ClientController::class)->except('show');
    Route::resource('locations', LocationController::class);
    Route::get('propriete/{id}/show', [ProprieteController::class, 'show'])->name('client.show');
});
// Routes pour les demandes (nécessitent que l'utilisateur soit authentifié)


// Route pour afficher les propriétés (si elle n'existe pas déjà)
Route::get('/propriete', [ProprieteController::class, 'index'])->name('propriete.index');
Route::get('/propriete/{propriete}', [ProprieteController::class, 'show'])->name('propriete.show');
Route::get('client/compte', [ClientController::class, 'compte'])->name('client.compte');
Route::get('client/information', [ClientController::class, 'information'])->name('client.information');
Route::put('/client/update-name', [ClientController::class, 'updateName'])->name('client.update.name');
Route::post('/client/update-contact', [ClientController::class, 'updateContact'])->name('client.update.contact');
Route::get('/client/connexion-securite', [ClientController::class, 'connexionSecurite'])->name('client.connexion_securite');
Route::put('/client/update-adresse', [ClientController::class, 'updateAdresse'])->name('client.update.adresse');
Route::put('/client/update-email', [ClientController::class, 'updateEmail'])->name('client.update.email');
Route::get('client/{id}', [ClientController::class, 'show'])->name('client.show');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/proprietes', [AdminProprieteController::class, 'index'])->name('proprietes.index');
    Route::get('/proprietes/{id}', [AdminProprieteController::class, 'show'])->name('proprietes.show');
    Route::delete('/proprietes/{id}', [AdminProprieteController::class, 'destroy'])->name('proprietes.destroy');
});




Route::get('/proprietes', [ProprieteController::class, 'toutesLesProprietes'])->name('proprietes.index');
Route::get('/proprietes/{id}', [ProprieteController::class, 'show'])->name('proprietes.show');


Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/lire/{id}', [NotificationController::class, 'marquerCommeLue'])->name('notifications.marquer_lue');
    Route::get('/notifications/tout-lire', [NotificationController::class, 'toutLire'])->name('notifications.tout_lire');
    Route::delete('/notifications/supprimer/{id}', [NotificationController::class, 'supprimer'])->name('notifications.supprimer');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/notifications/lire/{id}', [NotificationController::class, 'marquerCommeLue'])
        ->name('notifications.marquerCommeLue');
});



Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Tableau de bord admin
   
    // Profil admin
    Route::get('/profil', [ProfilController::class, 'adminIndex'])->name('profil.index'); // <-- nom correct
    Route::post('/profil/update', [ProfilController::class, 'adminUpdate'])->name('profil.update');
    Route::post('/profil/update-password', [ProfilController::class, 'adminUpdatePassword'])->name('profil.update-password');
});


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/profil', [ProfilController::class, 'adminIndex'])
        ->name('admin.profil.index');
});
// Pour les clients
Route::get('/client/{id}/notifications', [NotificationController::class, 'clientNotifications'])->name('client.notifications');

// Pour les agences
Route::get('/agence/{id}/notifications', [NotificationController::class, 'agenceNotifications'])->name('agence.notifications');

// Marquer comme lue
Route::get('/notification/{id}/lue', [NotificationController::class, 'marquerCommeLue'])->name('notification.lue');
Route::get('/agence/dashboard', [AgenceController::class, 'dashboard'])->name('agence.dashboard');
Route::get('/agence/demandes', [AgenceController::class, 'demandes'])->name('agence.demandes')->middleware('auth');
// Si c'est côté admin ou agence



// Côté client


// Côté agence

Route::get('/notifications/ajax', [NotificationController::class, 'ajax'])->name('mes.notifications.ajax');

Route::get('/proprietes-location-vente', [ProprieteController::class, 'indexLocationVente'])->name('propriete.locationVente.index');
Route::get('/admin/liste', [AdminController::class, 'index'])->name('admin.liste.index');
Route::get('/agences', [AgenceController::class, 'indexPublic'])->name('agences.index');
Route::get('/agences/{id}', [AgenceController::class, 'showPublic'])->name('agences.show');
Route::post('/proprietes/{id}/louer/payer', [PaiementController::class, 'louerPayer'])->name('proprietes.louer.payer');
Route::post('/proprietes/{id}/acheter/payer', [PaiementController::class, 'acheterPayer'])->name('proprietes.acheter.payer');

Route::middleware(['auth'])->prefix('agence')->name('agence.')->group(function () {

    // Tableau de bord agence
    Route::get('/dashboard', [AgenceDashboardController::class, 'index'])->name('dashboard');

    // Liste des transactions pour l'agence
    Route::get('/transactions', [PaiementController::class, 'index'])->name('transactions.index');
    Route::get('transactions/{id}/valider',[PaiementController::class, 'validerP']);

});
Route::get('/agence/clients', [ClientController::class, 'indexClients'])->name('agence.clients.index');
Route::middleware(['auth'])->prefix('agence')->name('agence.')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
    Route::post('/notifications/lire-tout', [NotificationController::class, 'marquerToutCommeLu'])->name('notifications.lireTout');
});
Route::delete('/agence/notifications/{notification}', [NotificationController::class, 'destroy'])
    ->name('agence.notifications.destroy');
Route::get('/agence/transactions/{id}', [PaiementController::class, 'show'])
    ->name('agence.paiements.show');

Route::middleware(['auth'])->prefix('agence')->name('agence.')->group(function () {
    Route::put('/password/update', [ProfilController::class, 'updatePassword'])->name('password.update');
});
Route::get('/propriete/{propriete}', [ProprieteController::class, 'show'])->name('propriete.show');
Route::resource('paiements', PaiementController::class);
Route::prefix('agence')->name('agence.')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/notifications/data', [NotificationController::class, 'data'])->name('notifications.data');
});
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::patch('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');
Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
Route::prefix('agence/notifications')->name('agence.notifications.')->group(function () {
    Route::get('/', [NotificationController::class, 'index'])->name('index');
    Route::post('/tout-lire', [NotificationController::class, 'toutLire'])->name('toutLire');
    Route::post('/{id}/marquer-comme-lue', [NotificationController::class, 'marquerCommeLue'])->name('marquerCommeLue');
    Route::delete('/{id}/supprimer', [NotificationController::class, 'supprimer'])->name('supprimer');
    Route::get('/{id}/lire', [NotificationController::class, 'lire'])->name('lire');
});
// routes/web.php
Route::get('client/paiements/{paiement}/pdf', [PaiementController::class, 'generatePdf'])
    ->name('client.paiements.pdf')
    ->middleware('auth');
    Route::middleware(['auth'])->group(function () {
    Route::get('/paiements/{paiement}/recu', [PaiementController::class, 'recu'])
        ->name('paiements.recu');
    
    Route::get('/paiements/{paiement}/recu-pdf', [PaiementController::class, 'recuPdf'])
        ->name('paiements.recuPdf');
});

Route::prefix('agence')->middleware(['auth'])->group(function () {
    // Autres routes agence ...

    // Voir le reçu d'un paiement
    Route::get('paiements/{paiement}/recu', [PaiementController::class, 'recuPdf'])->name('agence.paiements.recu');
    Route::get('paiements/{paiement}/recu', [PaiementController::class, 'recuPdfAgence'])->name('agence.paiements.recu');

});
// Routes pour les paiements côté agence
Route::prefix('agence')->middleware(['auth'])->group(function() {
    Route::get('paiements', [AgenceController::class, 'paiementsRecus'])->name('agence.paiements');
    Route::post('paiements/{paiement}/valider', [App\Http\Controllers\Admin\PaiementController::class, 'valider'])->name('agence.paiements.valider');
    Route::post('paiements/{paiement}/refuser', [App\Http\Controllers\Admin\PaiementController::class, 'refuser'])->name('agence.paiements.refuser');

    // Route pour générer/afficher le PDF du reçu côté agence
    Route::get('paiements/{paiement}/recu-pdf', [App\Http\Controllers\Admin\PaiementController::class, 'recuPdfAgence'])->name('agence.paiements.recu_pdf');
});
Route::prefix('agence')->name('agence.')->group(function () {
    Route::get('/paiements', [App\Http\Controllers\Admin\PaiementController::class, 'index'])->name('paiements.index');
});
Route::post('/agence/paiements/{id}/valider', [PaiementController::class, 'valider'])->name('agence.paiements.valider');
Route::post('/agence/paiements/{id}/rejeter', [PaiementController::class, 'rejeter'])->name('agence.paiements.rejeter');

// Routes côté agence
Route::prefix('agence')->middleware(['auth'])->group(function () {
    Route::get('paiements', [PaiementController::class, 'index'])->name('agence.paiements.index');

    Route::post('paiements/{paiement}/valider', [PaiementController::class, 'valider'])->name('agence.paiements.valider');
    Route::post('paiements/{paiement}/refuser', [PaiementController::class, 'refuser'])->name('agence.paiements.refuser');
    Route::delete('paiements/{paiement}', [PaiementController::class, 'destroy'])->name('paiements.destroy');

    Route::get('paiements/{paiement}/recu-pdf', [PaiementController::class, 'recuPdf'])->name('agence.paiements.recu_pdf');
});
Route::put('/agence/{agence}/logo', [AgenceController::class, 'updateLogo'])
     ->name('agence.logo.update')
     ->middleware('auth');

Route::put('/agence/{agence}', [AgenceController::class, 'update'])->name('agence.update');

Route::post('/client/update-password', [ClientController::class, 'updatePassword'])
    ->name('client.updatePassword');
    Route::get('/agence/propriete/{id}', [ProprieteController::class, 'show'])->name('agence.propriete.show');
Route::prefix('agence')->name('agence.')->group(function () {
    Route::get('/propriete/{id}', [ProprieteController::class, 'show'])->name('propriete.show');
    Route::get('/propriete/{id}/details', [ProprieteController::class, 'show1'])->name('propriete.show1');
});

Route::get('/admin/clients', [AdminClientController::class, 'index'])->name('admin.clients.index');
Route::resource('clients', AdminClientController::class);
Route::prefix('admin')->name('admin.')->group(function () {
    // Liste des propriétés
    Route::get('/proprietes', [AdminProprieteController::class, 'index'])->name('proprietes.index');

    // Voir détails d’une propriété
    Route::get('/proprietes/{id}', [AdminProprieteController::class, 'show1'])->name('proprietes.show');

Route::delete('/proprietes/{id}', [AdminProprieteController::class, 'destroy'])->name('proprietes.destroy');
});
Route::get('/admin/proprietes/{id}', [AdminProprieteController::class, 'show'])->name('admin.proprietes.show');
Route::get('/admin/agence/{id}', [AdminProprieteController::class, 'show'])->name('admin.agence.show');
// routes/web.php
Route::get('/admin/agence/{id}', [AgenceController::class, 'showAdmin'])->name('admin.agence.show');
Route::get('/admin/agence/{id}', [AdminAgenceController::class, 'info'])->name('admin.agence.info');
Route::get('/admin/propriete/{id}', [AdminAgenceController::class, 'show'])->name('admin.propriete.show');
Route::get("message", "MessageController@formMessageGoogle");
Route::post("message", "MessageController@sendMessageGoogle")->name('send.message.google');
Route::prefix('agence')->name('agence.')->group(function () {
    // route pour annuler un paiement
    Route::put('/paiements/{paiement}/annuler', [PaiementController::class, 'annuler'])
        ->name('paiements.annuler');

    // route pour valider un paiement
    Route::post('/paiements/{paiement}/valider', [PaiementController::class, 'valider'])
        ->name('paiements.valider');
});
Route::get('admin/agence/{id}', [AdminAgenceController::class, 'show'])->name('admin.agence.show');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/agence/{id}', [AdminAgenceController::class, 'info'])
        ->name('agence.info');

    Route::get('/agence/propriete/{id}', [AdminAgenceController::class, 'show'])
        ->name('agence.show');
});
Route::prefix('admin')->name('admin.')->group(function() {
    Route::resource('client', ClientController::class);
});
Route::prefix('admin')->name('admin.')->group(function () {
    // Liste des paiements côté administrateur
    Route::get('paiements', [PaiementController::class, 'adminIndex'])
         ->name('paiements.index'); // <-- ici le nom correspond à admin.paiements.index
});

Route::put('admin/profil', [ProfilController::class, 'adminUpdate'])->name('admin.profil.update');
Route::get('/admin/agence/{id}', [AgenceController::class, 'show'])->name('admin.agence.detail');
// Affichage d'une agence côté admin
Route::get('/admin/agence/{id}', [AdminAgenceController::class, 'info'])
    ->name('admin.agence.info');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/profil', [ProfilController::class, 'adminIndex'])->name('profil.index');
    Route::put('/profil', [ProfilController::class, 'adminUpdate'])->name('profil.update');
    Route::put('/profil/password', [ProfilController::class, 'adminUpdatePassword'])->name('profil.password.update');
});
// Notifications Admin
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('notification', [NotificationController::class, 'adminIndex'])->name('notification.index');
    Route::get('notification/{id}', [NotificationController::class, 'adminShow'])->name('notification.show');
    Route::put('notification/marquer-tout-comme-lu', [NotificationController::class, 'adminMarquerToutCommeLu'])->name('notification.marquerToutCommeLu');
    Route::delete('notification/{id}', [NotificationController::class, 'adminDestroy'])->name('notification.destroy');
});
Route::get('/mes-recus', [App\Http\Controllers\Admin\ClientController::class, 'mesRecus'])
     ->name('client.mes_recus');
     Route::post('/client/{id}/update', [ClientController::class, 'update'])->name('client.update');
Route::prefix('agence')->name('agence.')->group(function () {
    Route::get('/profils', [ProfilController::class, 'index'])->name('profils.index');
    Route::put('/profils', [ProfilController::class, 'update'])->name('profils.update');
    Route::put('/profils/password', [ProfilController::class, 'updatePassword'])->name('profils.password.update');
});
Route::put('/agence/profils', [AgenceController::class, 'updateAgence'])->name('agence.update');
Route::post('/agence/logo', [AgenceController::class, 'updateLogo'])->name('agence.updateLogo');
Route::put('/agence/profils', [AgenceController::class, 'updateProfil'])->name('agence.update');

Route::middleware(['auth', 'agence'])->group(function () {
    // Mise à jour du profil agence connecté
    Route::put('/agence/profils', [AgenceController::class, 'updateLogo'])->name('agence.updateProfil');

    // Mise à jour du mot de passe
    Route::put('/agence/password', [AgenceController::class, 'updatePassword'])->name('agence.updatePassword');
});