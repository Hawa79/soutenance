<h2>Bienvenue {{ Auth::guard()->user()->name }}</h2>

<p>Email : {{ Auth::guard()->user()->email }}</p>
<!-- <p>Téléphone : {{ Auth::guard()->user()->telephone }}</p> -->

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Se déconnecter</button>
</form>
