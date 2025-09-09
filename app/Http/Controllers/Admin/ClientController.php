<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Paiement;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ClientController extends Controller
{
    // Liste de tous les clients (admin)
    public function index()
    {
        $clients = User::where('type', User::TYPE_CLIENT)->get();
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        return view('client.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'sexe' => 'required|in:M,Mme,Autre',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'sexe' => $request->sexe,
            'password' => Hash::make($request->password),
            'type' => User::TYPE_CLIENT,
        ]);

        return redirect()->route('admin.client.index')->with('success', 'Client ajouté avec succès.');
    }

    public function show(User $client)
    {
        return view('client.notifications', compact('client'));
    }

    public function edit(User $client)
    {
        return view('client.edit', compact('client'));
    }

    public function destroy(User $client)
    {
        $client->delete();
        return redirect()->route('admin.client.index')->with('success', 'Client supprimé avec succès.');
    }


    private function checkClient()
    {
        

        $user = Auth::user();
        if (!$user || $user->type != User::TYPE_CLIENT) {
            abort(403, 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
        return null;
    }

    public function accueil()
    {
        return $this->checkClient() ?? view('client.accueil');
    }

    public function profil()
    {
        return $this->checkClient() ?? view('client.profil', ['user' => Auth::user()]);
    }

    public function information()
    {
        return $this->checkClient() ?? view('client.information');
    }

    public function connexionSecurite()
    {
        return $this->checkClient() ?? view('client.connexion_securite');
    }

    public function adresse()
    {
        return $this->checkClient() ?? view('client.adresse');
    }
    public function update(Request $request, $id)
    {
        // Récupérer l'utilisateur connecté
        $user = User::findOrFail($id);

        // Vérifier qu'il modifie bien SON propre compte
        if ($user->id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }

        // Validation
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'prenom'    => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email,'.$user->id,
            'telephone' => 'nullable|string|max:20',
            'adresse'   => 'nullable|string|max:255',
            'sexe'      => 'nullable|string|in:M,Mme,Autre',
        ]);

        // Mise à jour
        $user->update($validated);

        return redirect()->back()->with('success', 'Vos informations ont été mises à jour avec succès.');
    }

    public function handleSignup(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'sexe' => 'required|in:M,Mme,Autre',
        ]);

        $user = User::create([
            'prenom' => $request->prenom,
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone ?? null,
            'adresse' => $request->adresse ?? null,
            'sexe' => $request->sexe,
            'password' => Hash::make($request->password),
            'type' => User::TYPE_CLIENT,
        ]);

        Auth::login($user);

        return redirect()->route('accueil')->with('success', 'Inscription réussie, bienvenue !');
    }
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required', 'current_password'],
        'new_password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    $user = auth()->user();
    $user->password = Hash::make($request->new_password);
    $user->save();

    return back()->with('success', 'Mot de passe modifié avec succès !');
}


    // Liste des clients d’une agence (client ayant fait au moins un paiement)
    public function indexClients()
    {
        $agenceId = Auth::id(); 

        $clients = User::where('type', User::TYPE_CLIENT)
            ->whereHas('paiements', function ($query) use ($agenceId) {
                $query->whereHas('propriete', function ($q) use ($agenceId) {
                    $q->where('agence_id', $agenceId);
                });
            })
            ->withCount(['paiements as transactions_count' => function ($query) use ($agenceId) {
                $query->whereHas('propriete', function ($q) use ($agenceId) {
                    $q->where('agence_id', $agenceId);
                });
            }])
            ->get();

        return view('agence.clients.index', compact('clients'));
    }

    // Notifications client
    public function notifications()
    {
        $this->checkClient();

        $user = Auth::user();
        $notifications = $user->notifications()->latest()->get();

        return view('client.notifications', compact('notifications'));
    }
    public function mesRecus()
{
    $this->checkClient(); // Vérifie que c'est bien un client

    $user = Auth::user();

    // Récupère tous les paiements du client avec les propriétés associées
    $recus = Paiement::where('user_id', $user->id)
                ->with('propriete') // si tu veux afficher les infos de la propriété
                ->get();

    return view('client.mes_recus', compact('recus'));
}
    
}
