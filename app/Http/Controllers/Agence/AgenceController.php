<?php

namespace App\Http\Controllers\Agence;

use App\Models\User;
use App\Models\Agence;
use App\Models\Paiement;
use App\Models\Propriete;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Notification;

class AgenceController extends Controller
{
    // --- Côté admin ---

    // Liste toutes les agences
    public function index()
    {
        $agences = User::where('type', User::TYPE_AGENCE)->get();
        return view('admin.agence.index', compact('agences'));
    }

    public function create()
    {
        return view('admin.agence.create');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'prenom' => 'nullable|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'nullable|string|min:6',
            'nom_du_responsable' => 'required|string',
            'telephone' => 'nullable|string',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string',
            'logo' => 'nullable|image',
        ]);

        $agence = new User();
        $agence->name = $request->name;
        $agence->prenom = $request->prenom;
        $agence->email = $request->email;
        $agence->password = Hash::make($request->password ?? 'password');
        $agence->type = User::TYPE_AGENCE;
        $agence->nom_du_responsable = $request->nom_du_responsable;
        $agence->telephone = $request->telephone;
        $agence->description = $request->description;
        $agence->adresse = $request->adresse;

        if ($request->hasFile('logo')) {
            $agence->logo = $request->file('logo')->store('logos', 'public');
        }

        $agence->save();

        toastr()->success("Agence ajoutée avec succès");
        return redirect()->route('admin.agence.index');
    }

    public function show($id)
    {
        $agence = User::where('type', User::TYPE_AGENCE)->find($id);
        if (!$agence) {
            toastr()->error("Agence non trouvée");
            return redirect()->route('admin.agence.index');
        }
        return view('admin.agence.show', compact('agence'));
    }

    public function edit($id)
    {
        $agence = User::where('type', User::TYPE_AGENCE)->find($id);
        if (!$agence) {
            toastr()->error("Agence non trouvée");
            return redirect()->route('admin.agence.index');
        }
        return view('admin.agence.edit', compact('agence'));
    }

    public function update(Request $request, $id)
    {
        $agence = User::where('type', User::TYPE_AGENCE)->find($id);
        if (!$agence) {
            toastr()->error("Agence non trouvée");
            return redirect()->route('admin.agence.index');
        }

        $request->validate([
            'name' => 'required|string',
            'prenom' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6',
            'nom_du_responsable' => 'required|string',
            'telephone' => 'nullable|string',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string',
            'logo' => 'nullable|image',
        ]);

        $agence->fill($request->only(['name','prenom','email','nom_du_responsable','telephone','description','adresse']));

        if ($request->filled('password')) {
            $agence->password = Hash::make($request->password);
        }

        if ($request->hasFile('logo')) {
            if ($agence->logo && file_exists(storage_path('app/public/' . $agence->logo))) {
                unlink(storage_path('app/public/' . $agence->logo));
            }
            $agence->logo = $request->file('logo')->store('logos', 'public');
        }

        $agence->save();

        toastr()->success("Agence modifiée avec succès");
        return redirect()->route('admin.agence.index');
    }

    public function delete($id)
    {
        $agence = User::where('type', User::TYPE_AGENCE)->find($id);
        if ($agence) {
            if ($agence->logo && file_exists(storage_path('app/public/' . $agence->logo))) {
                unlink(storage_path('app/public/' . $agence->logo));
            }
            $agence->delete();
            toastr()->success("Agence supprimée avec succès");
        } else {
            toastr()->error("Agence non trouvée");
        }
        return redirect()->route('admin.agence.index');
    }

    // --- Agence connectée ---

    // Paiements reçus par l'agence connectée
    public function paiementsRecus()
    {
        $paiements = Paiement::where('agence_id', auth()->id())
            ->with('client', 'propriete')
            ->latest()
            ->get();

        return view('agence.paiements', compact('paiements'));
    }

    // Mise à jour du mot de passe
    public function updatePassword(Request $request)
    {
        $agence = auth()->user();
        if ($agence->type != User::TYPE_AGENCE) {
            abort(403, 'Accès non autorisé');
        }

        $request->validate([
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::min(8)->letters()->mixedCase()->numbers()->symbols(),
                function ($attribute, $value, $fail) use ($agence) {
                    if (Str::contains(strtolower($value), strtolower($agence->email))) {
                        $fail('Le mot de passe est trop proche de votre adresse e-mail.');
                    }
                },
            ],
        ]);

        $agence->password = Hash::make($request->password);
        $agence->save();

        toastr()->success('Mot de passe mis à jour avec succès.');
        return redirect()->back();
    }

    // Notifications
    public function notifications()
    {
        $agence = auth()->user();

        $notifications = Notification::where('notifiable_type', User::class)
            ->where('notifiable_id', $agence->id)
            ->latest()
            ->get();

        Notification::where('notifiable_type', User::class)
            ->where('notifiable_id', $agence->id)
            ->where('lu', false)
            ->update(['lu' => true]);

        return view('agence.notifications', compact('notifications'));
    }

    // --- Affichage public ---
    public function indexPublic(Request $request)
    {
        $query = User::where('type', User::TYPE_AGENCE)->withCount('proprietes');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $agences = $query->get();

        return view('agences.index', compact('agences'));
    }

    public function showPublic(Request $request, $id)
    {
        $agence = User::where('type', User::TYPE_AGENCE)->findOrFail($id);
        $query = $agence->proprietes()->latest();

        if ($request->filled('ville')) {
            $query->where('ville', $request->ville);
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $proprietes = $query->paginate(6);

        return view('agences.show', compact('agence', 'proprietes'));
    }

    // Mise à jour du logo agence connectée
    public function updateLogo(Request $request)
    {
        $agence = auth()->user();

        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($agence->logo && file_exists(storage_path('app/public/' . $agence->logo))) {
            unlink(storage_path('app/public/' . $agence->logo));
        }

        $agence->logo = $request->file('logo')->store('logos', 'public');
        $agence->save();

        return back()->with('success', 'Logo mis à jour avec succès !');
    }

    // Mise à jour du profil complet agence connectée
    public function updateProfil(Request $request)
    {
        $agence = auth()->user();

        $request->validate([
            'name' => 'required|string',
            'prenom' => 'nullable|string',
            'email' => 'required|email|unique:users,email,' . $agence->id,
            'password' => 'nullable|string|min:6',
            'nom_du_responsable' => 'required|string',
            'telephone' => 'nullable|string',
            'description' => 'nullable|string',
            'adresse' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $agence->fill($request->only(['name','prenom','email','nom_du_responsable','telephone','description','adresse']));

        if ($request->filled('password')) {
            $agence->password = Hash::make($request->password);
        }

        if ($request->hasFile('logo')) {
            if ($agence->logo && file_exists(storage_path('app/public/' . $agence->logo))) {
                unlink(storage_path('app/public/' . $agence->logo));
            }
            $agence->logo = $request->file('logo')->store('logos', 'public');
        }

        $agence->save();

        toastr()->success("Profil mis à jour avec succès");
        return redirect()->back();
    }

    // Infos agence côté admin
    public function info($id)
    {
        $agence = Agence::findOrFail($id);
        $proprietes = Propriete::where('agence_id', $id)->with('images')->get();

        return view('admin.agence.info', compact('agence', 'proprietes'));
    }

    public function showAdmin($id)
    {
        $agence = User::where('type', User::TYPE_AGENCE)->with('proprietes.images')->findOrFail($id);
        $proprietes = $agence->proprietes;

        return view('admin.agence.show', compact('agence', 'proprietes'));
    }

    public function showAgence($id)
    {
        $agence = User::where('type', User::TYPE_AGENCE)->with('proprietes.images')->findOrFail($id);
        $proprietes = $agence->proprietes;

        return view('admin.agence.show', compact('agence', 'proprietes'));
    }
}
