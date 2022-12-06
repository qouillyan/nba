@extends('layouts.master')

@section('title', $player->name)

@section('content')

    <h1>{{ $player->first_name }} {{ $player->last_name }}</h1>

    <p>Email: {{ $player->email }}</p>

    <p>Team: {{ $player->team->name }} </p>
    
@endsection