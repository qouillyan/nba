<p>Hello {{ $team->name }},</p>
<p>You have a new comment on your team page <a href="{{ url('teams/' . $team->id) }}">{{ $team->name }}</a></p>