@extends('layouts.master')

@section('title', $newssg->title)

@section('content')

    <h1>{{ $newssg->title }}</h1>

    <p>{{ $newssg->created_at }} by {{ $newssg->user->name }}<p>

    <p>{{ $newssg->content }}</p>

@endsection
