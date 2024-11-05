<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Movie;
use App\Models\Theater;
use Illuminate\Http\Request;

class AnalyticsController extends Controller {
    public function index() {
        // Calculate average sales per theater
        $averageSalesPerTheater = Sale::avg('sales_amount');

        // Fetch top selling movie
        $topSellingMovieData = Sale::selectRaw('movie_id, SUM(sales_amount) as total_sales')
            ->groupBy('movie_id')
            ->orderByDesc('total_sales')
            ->first();
        $topSellingMovie = Movie::find($topSellingMovieData->movie_id)->title;

        // Fetch top selling theater
        $topSellingTheaterData = Sale::selectRaw('theater_id, SUM(sales_amount) as total_sales')
            ->groupBy('theater_id')
            ->orderByDesc('total_sales')
            ->first();
        $topSellingTheater = Theater::find($topSellingTheaterData->theater_id)->name;

        
        // Fetch total sales data for Total Daily Sales chart
        $salesSum = Sale::selectRaw('date, SUM(sales_amount) as total_sales')
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        $dates = $salesSum->pluck('date');
        $totalSales = $salesSum->pluck('total_sales');

        // Prepare data for the Movie Sales chart
        $movies = Movie::all();
        $theaters = Theater::all();
        $sales = Sale::with(['movie', 'theater'])->get();

        $chartData = [];
        foreach ($movies as $movie) {
            $movieSales = $sales->where('movie_id', $movie->id)
                ->map(function ($sale) {
                    return [
                        'date' => $sale->date,
                        'sales_amount' => $sale->sales_amount
                    ];
                })->values()->toArray();
            $chartData[$movie->id] = [
                'title' => $movie->title,
                'sales' => $movieSales
            ];
        }
        
        return view('pages.analytics', [
            'dates' => $dates,
            'totalSales' => $totalSales,
            'chartData' => $chartData,
            'movies' => $movies,
            '$averageSalesPerTheater' => $averageSalesPerTheater,
            'topSellingMovie' => $topSellingMovie,
            'topSellingTheater' => $topSellingTheater
        ]);
    }
}