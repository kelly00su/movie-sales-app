@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Admin Dashboard</h2>

    <!-- Theaters Section -->
    <div class="card mb-4">
        <h3>Theaters</h3>
        @foreach($theaters as $theater)
        <div class="card mb-4">
                <div>
                    <div class="theater-info">
                        <p><strong>Name:</strong> {{ $theater->name }}</p>
                        <p><strong>Location:</strong> {{ $theater->location }}</p>
                        <button class="btn btn-sm btn-primary" onclick="toggleEdit('theater', {{ $theater->id }})">Edit</button>
                    </div>
                    <div class="theater-edit" id="theater-edit-{{ $theater->id }}" style="display: none;">
                        <form action="{{ route('admin.updateTheater', $theater->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="name" value="{{ $theater->name }}" required>
                            <input type="text" name="location" value="{{ $theater->location }}" required>
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>
                        </form>
                        <form action="{{ route('admin.destroyTheater', $theater->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <button class="btn btn-secondary btn-sm" onclick="toggleEdit('theater', {{ $theater->id }})">Cancel</button>
                    </div>
                </div>
            </div>
        @endforeach
        <form action="{{ route('admin.storeTheater') }}" method="POST">
             @csrf
             <input type="text" name="name" placeholder="Name" required>
             <input type="text" name="location" placeholder="Location" required>
             <button type="submit" class="btn btn-primary btn-sm">Add Theater</button>
        </form>

    </div>

    <!-- Movies Section -->
    <div class="card mb-4">
        <h3>Movies</h3>
        @foreach($movies as $movie)
        <div class="card mb-4">
                <div>
                    <div class="movie-info">
                        <p><strong>Title:</strong> {{ $movie->title }}</p>
                        <p><strong>Release Date:</strong> {{ $movie->release_date }}</p>
                        <button class="btn btn-sm btn-primary" onclick="toggleEdit('movie', {{ $movie->id }})">Edit</button>
                    </div>
                    <div class="movie-edit" id="movie-edit-{{ $movie->id }}" style="display: none;">
                        <form action="{{ route('admin.updateMovie', $movie->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $movie->title }}" required>
                            <input type="date" name="release_date" value="{{ $movie->release_date }}" required>
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>
                        </form>
                        <form action="{{ route('admin.destroyMovie', $movie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <button class="btn btn-secondary btn-sm" onclick="toggleEdit('movie', {{ $movie->id }})">Cancel</button>
                    </div>
                </div>
            </div>
        @endforeach
        <form action="{{ route('admin.storeMovie') }}" method="POST">
             @csrf
             <input type="text" name="title" placeholder="Title" required>
             <input type="date" name="release_date" required>
             <button type="submit" class="btn btn-primary btn-sm">Add Movie</button>
        </form>
    </div>

    <!-- Sales Section -->
    <div class="card mb-4">
        <h3>Sales</h3>
        @foreach($sales as $sale)
            <div class="card mb-4">
                <div>
                    <div class="sale-info">
                        <p><strong>Movie:</strong> {{ $sale->movie->title }}</p>
                        <p><strong>Theater:</strong> {{ $sale->theater->name }}</p>
                        <p><strong>Date:</strong> {{ $sale->date }}</p>
                        <p><strong>Sales Amount:</strong> ${{ $sale->sales_amount }}</p>
                        <button class="btn btn-sm btn-primary" onclick="toggleEdit('sale', {{ $sale->id }})">Edit</button>
                    </div>
                    <div class="sale-edit" id="sale-edit-{{ $sale->id }}" style="display: none;">
                        <p>{{ $sale->movie->title }} at {{ $sale->theater->name }}</p>
                        <form action="{{ route('admin.updateSale', $sale->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="date" name="date" value="{{ $sale->date }}" required>
                            <input type="number" name="sales_amount" value="{{ $sale->sales_amount }}" required>
                            <button type="submit" class="btn btn-warning btn-sm">Update</button>
                        </form>
                        <form action="{{ route('admin.destroySale', $sale->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <button class="btn btn-secondary btn-sm" onclick="toggleEdit('sale', {{ $sale->id }})">Cancel</button>
                    </div>
                </div>
            </div>
        @endforeach
        <form action="{{ route('admin.storeSale') }}" method="POST">
             @csrf
             <select name="movie_id" required>
                 <option value="" disabled selected>Select Movie</option>
                 @foreach($movies as $movie)
                     <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                 @endforeach
             </select>
             <select name="theater_id" required>
                 <option value="" disabled selected>Select Theater</option>
                 @foreach($theaters as $theater)
                     <option value="{{ $theater->id }}">{{ $theater->name }}</option>
                 @endforeach
             </select>
             <input type="date" name="date" placeholder="Date" required>
             <input type="number" name="sales_amount" placeholder="Sales Amount" required>
             <button type="submit" class="btn btn-primary btn-sm">Add Sale</button>
        </form>
    </div>

    <script>
        function toggleEdit(type, id) {
            var editDiv = document.getElementById(type + '-edit-' + id);
            var infoDiv = editDiv.previousElementSibling;
            if (editDiv.style.display === 'none') {
                editDiv.style.display = 'block';
                infoDiv.style.display = 'none';
            } else {
                editDiv.style.display = 'none';
                infoDiv.style.display = 'block';
            }
        }
    </script>
    </div>
@endsection
