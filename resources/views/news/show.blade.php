@extends('layouts.master')

@section('title', $newssg->title)

@section('content')

    <h1>{{ $newssg->title }}</h1>

    <h4>Teams:</h4>

    @foreach($newssg->teams as $team)

        <ul>
            <li>
                <a href="{{ route('single-team', ['id' => $team->id]) }}">
                    {{ $team->name }}
                </a>
            </li>
        </ul>
        
    @endforeach

    <p>{{ $newssg->created_at }} by {{ $newssg->user->name }}<p>

    <p>{{ $newssg->content }}</p>

@endsection
