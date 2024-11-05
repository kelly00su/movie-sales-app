@extends('layouts.app')

@section('content')
    <div class="card">
        <h2 class="text-center mb-4">Find Theater with Highest Sales</h2>
        <form action="/highest-sales" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date" class="form-label">Enter Date:</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>

    <div style="margin-top: 40px" class="card">
        <h2 class="text-center mb-4">Find Movie with Highest Sales</h2>
        <form action="/highest-sales" method="POST">
        <form action="{{ route('highestMovieSales') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="date">Enter Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
@endsection
