@extends('layouts.master')

@section('title', $team->name)

@section('content')

    <h1>{{ $team->name }}: News</h1>

    @foreach($team->news as $newsSingular)

            <ul>
                <li>
                    <a href="{{ route('single-news', ['id' => $newsSingular->id]) }}">
                        [{{ $newsSingular->created_at }}] {{ $newsSingular->title }}
                    </a>
                </li>
            </ul>
            
        @endforeach

@endsection
