<header>
    @if(Auth::check())
        <a href="/news">News</a>
        <a href="/news/create">Submit</a>
        <a href="/teams">Teams</a>
        <a href="/logout">Log out</a>
        <a hred="/">{{ auth()->user()->name }}</a>
    @else
        <a href="/register">Register</a>
        <a href="/login">Log in</a>
    @endif
</header>