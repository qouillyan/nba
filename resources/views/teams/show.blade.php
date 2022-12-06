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


@endsection