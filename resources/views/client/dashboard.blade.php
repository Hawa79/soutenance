<h2>Bienvenue {{ Auth::user()->name }}</h2>

<p>Email : {{ Auth::user()->email }}</p>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Se déconnecter</button>
</form>
