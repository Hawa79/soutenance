<?php
namespace App\Http\Controllers\Admin;

use App\Models\Agence;
use App\Models\Propriete;
use Flasher\Prime\Storage\Storage;
use App\Http\Controllers\Controller;

class AdminProprieteController extends Controller
{
    public function index()
    {
        $proprietes = Propriete::with('agence')->latest()->get();
        return view('admin.proprietes.index', compact('proprietes'));
    }

    public function show($id)
    {
        $propriete = Propriete::with(['agence', 'images'])->findOrFail($id);
        return view('admin.proprietes.show1', compact('propriete'));
    }

    public function destroy($id)
    {
        $propriete = Propriete::with('images')->findOrFail($id);

        foreach ($propriete->images as $image) {
            Storage::disk('public')->delete($image->image);
            $image->delete();
        }

        $propriete->delete();

        return back()->with('success', 'Propriété supprimée avec succès');
    }
    


}
