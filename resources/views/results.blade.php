@extends('layouts.app')

@section('content')
    <div class="card">
        @if(isset($highestTheaterSales))
            <h2 class="text-center mb-4">Theater with Highest Sales</h2>
            <p><strong>Theater:</strong> {{ $highestTheaterSales->name }}</p>
            <p><strong>Sales:</strong> ${{ $highestTheaterSales->sales_amount }}</p>
        @elseif(isset($message))
            <p class="text-center">{{ $message }}</p>
        @endif
        <div class="d-grid gap-2 mt-4">
            <a href="/" class="btn btn-secondary">Back to Search</a>
        </div>
    </div>
@endsection
