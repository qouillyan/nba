@extends('layouts.master')

@section('title', 'News')

@section('content')

    <h1>News</h1>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @foreach($news as $singlnews)

        <ul>
            <li>
                <a href="{{ route('single-news', ['id' => $singlnews->id]) }}">
                    {{ $singlnews->title }}
                </a>
            </li>
        </ul>
        
    @endforeach

    {{ $news->links() }}

@endsection
