<?php

namespace App\Http\Controllers;

use App\Models\Theater;
use App\Models\Movie;
use App\Models\Sale;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Once login is implemented, you can add extra protection with this function to ensure that only authorized users can access these methods
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('can:manage-admin');
    // }
    
    public function index()
    {
        $theaters = Theater::all();
        $movies = Movie::all();
        $sales = Sale::with(['movie', 'theater'])->get();
        
        return view('pages.admin.index', compact('theaters', 'movies', 'sales'));
    }

    // CREATE functions
    public function storeTheater(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
        Theater::create($request->all());
        return redirect()->route('pages.admin.index')->with('success', 'Theater added successfully!');
    }

    public function storeMovie(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
        ]);
        Movie::create($request->all());
        return redirect()->route('pages.admin.index')->with('success', 'Movie added successfully!');
    }

    public function storeSale(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'theater_id' => 'required|exists:theaters,id',
            'date' => 'required|date',
            'sales_amount' => 'required|numeric',
        ]);

        Sale::create([
            'movie_id' => $request->input('movie_id'),
            'theater_id' => $request->input('theater_id'),
            'date' => $request->input('date'),
            'sales_amount' => $request->input('sales_amount'),
        ]);
        return redirect()->route('pages.admin.index')->with('success', 'Sales record added successfully!');
    }

    // UPDATE functions
    public function updateTheater(Request $request, $id)
    {
        $theater = Theater::findOrFail($id);
        $theater->update($request->only(['name', 'location']));
        return redirect()->route('pages.admin.index')->with('success', 'Theater updated successfully!');
    }

    public function updateMovie(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->only(['title', 'release_date']));
        return redirect()->route('pages.admin.index')->with('success', 'Movie updated successfully!');
    }

    public function updateSale(Request $request, $id)
    {
        $sale = Sale::findOrFail($id);
        $sale->update($request->only(['movie_id', 'theater_id', 'date', 'sales_amount']));
        return redirect()->route('pages.admin.index')->with('success', 'Sales record updated successfully!');
    }

    // DELETE functions
    public function destroyTheater($id)
    {
        Theater::destroy($id);
        return redirect()->route('pages.admin.index')->with('success', 'Theater deleted successfully!');
    }

    public function destroyMovie($id)
    {
        Movie::destroy($id);
        return redirect()->route('pages.admin.index')->with('success', 'Movie deleted successfully!');
    }

    public function destroySale($id)
    {
        Sale::destroy($id);
        return redirect()->route('pages.admin.index')->with('success', 'Sales record deleted successfully!');
    }
}
