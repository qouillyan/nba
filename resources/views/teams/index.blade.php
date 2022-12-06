@extends('layouts.master')

@section('title', 'Teams')

@section('content')

    <h1>Teams</h1>

    @foreach($teams as $team)

        <ul>
            <li>
                <a href="{{ route('single-team', ['id' => $team->id]) }}">
                    {{ $team->name }}
                </a>
            </li>
        </ul>
        
    @endforeach

    
@endsection
