<?php

namespace App\Http\Controllers;
use App\Models\Propriete;

use Illuminate\View\View;
use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function index()
    {
        $proprietes = Propriete::with(['images', 'agence'])->latest()->take(5)->get();

        return view('frontend.index', compact('proprietes'));

    }
}
