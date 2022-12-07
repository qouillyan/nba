@extends('layouts.master')

@section('title', 'Submit News')

@section('content')
    <form method="POST" action="/news">

        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>

        @error('title')
            @include('partials.error')
        @enderror

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Content</label>
            <textarea name="body" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Content"></textarea>
        </div>

        @error('body')
            @include('partials.error')
        @enderror

        <h3>Teams:</h3>

        @if(count($teams))
            @foreach ($teams as $team)
                    
                    <br>
                    <input type="checkbox" id="team{{ $team->id }}" value={{ $team->id}} name="teams[]">
                    <label for="team{{ $team->id }}">{{ $team->name }}</label>

            @endforeach
                
            @error('teams')
                @include('partials.error')
            @enderror
        @endif

            <br>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
@endsection
