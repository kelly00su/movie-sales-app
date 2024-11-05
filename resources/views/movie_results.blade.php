<!-- resources/views/movie_results.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="card">
        @if(isset($highestMovieSales))
            <h2 class="text-center mb-4">Movie with Highest Sales</h2>
            <p><strong>Movie:</strong> {{ $highestMovieSales->title }}</p>
            <p><strong>Sales:</strong> ${{ $highestMovieSales->sales_amount }}</p>
        @elseif(isset($message))
            <p class="text-center">{{ $message }}</p>
        @endif
        <div class="d-grid gap-2 mt-4">
            <a href="/" class="btn btn-secondary">Back to Search</a>
        </div>
    </div>
@endsection