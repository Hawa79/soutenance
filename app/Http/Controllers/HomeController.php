<?php
  
namespace App\Http\Controllers;
  
use App\Models\Propriete;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        $proprietes = Propriete::with(['images', 'agence'])->latest()->take(5)->get();

        return view('home', compact('proprietes'));

    } 
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminDashboard(): View
    {
        return view('admin.index');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function agenceDashboard(): View
    {
        return view('agence.dashboard');
    }
}