<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function highestTheaterSales(Request $request) {
        $request->validate([
            'date' => 'required|date',
        ]);
        $date = $request->input('date');
        $highestTheaterSales = Sale::where('date', $date)
            ->join('theaters', 'sales.theater_id', '=', 'theaters.id')
            ->select('theaters.name', 'sales.sales_amount')
            ->orderByDesc('sales.sales_amount')
            ->first();

        if ($highestTheaterSales) {
            return view('results', ['highestTheaterSales' => $highestTheaterSales]);
        } else {
            return view('results', ['message' => 'No sales data found for this date.']);
        }
    }

    public function index() {
        return view('pages.home');
    }

    public function highestMovieSales(Request $request) {
        $request->validate([
            'date' => 'required|date',
        ]);
        $date = $request->input('date');
        $highestMovieSales = Sale::where('date', $date)
            ->join('movies', 'sales.movie_id', '=', 'movies.id')
            ->select('movies.title', 'sales.sales_amount')
            ->orderByDesc('sales.sales_amount')
            ->first();

        if ($highestMovieSales) {
            return view('movie_results', ['highestMovieSales' => $highestMovieSales]);
        } else {
            return view('movie_results', ['message' => 'No sales data found for this date.']);
        }
    }
}
