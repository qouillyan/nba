<header>
    @if(Auth::check())
        <a href="/">Teams</a>
        <a href="/logout">Log out</a>
        <p>{{ auth()->user()->name }}</p>
    @else
        <a href="/register">Register</a>
        <a href="/login">Log in</a>
    @endif
</header>