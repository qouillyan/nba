@extends('layouts.master')

@section('title', 'Log in')

@section('content')

    <br>

    <h3>Log in</h3>

    <br>

    <form method="POST" action="/login">

        @csrf

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
            <input name="email" class="form-control" id="exampleFormControlTextarea1" placeholder="email@test.com"/>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleFormControlTextarea1" placeholder="Password"/>
        </div>

        @error('message')
            @include('partials.error')
        @enderror

        <button type="submit" class="btn btn-primary mt-3">Log in</button>
    </form>
    
@endsection