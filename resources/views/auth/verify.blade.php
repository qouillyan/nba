@extends('layouts.master')

@section('title', 'Verify Email')

@section('content')

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @error('message')
        @include('partials.error')
    @enderror
    
@endsection