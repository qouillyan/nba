@extends('layouts.master')

@section('title', $team->name)

@section('content')

    <h1>{{ $team->name }}</h1>

    <p>Email: {{ $team->email }}</p>

    <p>Address: {{ $team->address }}</p>

    <p>City: {{ $team->city }}</p>

    <h3>Players: </h3>
        <table style="border: 1px solid black">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
            </tr>
    @foreach($team->players as $player)
            <tr>
                <td>
                    <a href="{{ route('single-player', ['id' => $player->id]) }}">
                        {{ $player->first_name }}
                    </a>
                </td>
                <td>{{ $player->last_name }}</td>
                <td>{{ $player->email }}</td>
            </tr>
    @endforeach

        </table>

        <h4>Team related news: </h4>

        @foreach($team->news as $newsSingular)

            <ul>
                <li>
                    <a href="{{ route('single-news', ['id' => $newsSingular->id]) }}">
                        [{{ $newsSingular->created_at }}] {{ $newsSingular->title }}
                    </a>
                </li>
            </ul>
            
        @endforeach

        <a href="{{ route('news-by-teams', ['id' => $team->id]) }}">
            All team related news
        </a>

        <br>

        <form method="POST" action="/teams/{{ $team->id }}/comments">

            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Comment:</label>
                <input type="text" name="body" class="form-control" id="title" placeholder="Comment">
            </div>

            @error('body')
                @include('partials.error')
            @enderror

                <button type="submit" class="btn btn-primary mt-3">Send comment</button>

        </form>

        <h3>Comments</h3>

        @foreach($team->comments as $comment)

            <p>[{{ $comment->user->name }}]: {{ $comment->body }}</p>
            
        @endforeach



@endsection