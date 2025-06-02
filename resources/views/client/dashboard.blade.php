<h2>Bienvenue {{ Auth::guard('client')->user()->prenom }}</h2>

<p>Email : {{ Auth::guard('client')->user()->email }}</p>
<p>Téléphone : {{ Auth::guard('client')->user()->telephone }}</p>

<form method="POST" action="{{ route('client.logout') }}">
    @csrf
    <button type="submit">Se déconnecter</button>
</form>
