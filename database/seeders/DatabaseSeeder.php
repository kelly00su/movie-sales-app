<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Theater;
use App\Models\Movie;
use App\Models\Sale;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    public function run() {
        $theater1 = Theater::create(['name' => 'AMC Santa Monica', 'location' => '1932 3rd Street, Santa Monica, CA 90404']);
        $theater2 = Theater::create(['name' => 'iPIC Theater', 'location' => '12404 Jefferson Blvd, Los Angeles, CA 90223']);
        $theater3 = Theater::create(['name' => 'AMC Culver City', 'location' => '1333 Roosevelt Street, Los Angeles, CA 90402']);

        
        $movie1 = Movie::create(['title' => 'Forrest Gump', 'release_date' => '1994-07-06']);
        $movie2 = Movie::create(['title' => 'Interstellar', 'release_date' => '2014-11-07']);
        $movie3 = Movie::create(['title' => 'Inception', 'release_date' => '2010-07-16']);
        $movie4 = Movie::create(['title' => 'Happy Gilmore', 'release_date' => '2008-07-18']);
        
        Sale::create(['movie_id' => 1, 'theater_id' => 8, 'date' => '2024-10-31', 'sales_amount' => 500]);
        Sale::create(['movie_id' => 1, 'theater_id' => 8, 'date' => '2024-11-01', 'sales_amount' => 600]);
        Sale::create(['movie_id' => 1, 'theater_id' => 8, 'date' => '2024-11-02', 'sales_amount' => 700]);
        Sale::create(['movie_id' => 1, 'theater_id' => 8, 'date' => '2024-11-02', 'sales_amount' => 800]);
        Sale::create(['movie_id' => 1, 'theater_id' => 8, 'date' => '2024-11-03', 'sales_amount' => 500]);
        Sale::create(['movie_id' => 1, 'theater_id' => 8, 'date' => '2024-10-30', 'sales_amount' => 500]);
        Sale::create(['movie_id' => 1, 'theater_id' => 8, 'date' => '2024-10-29', 'sales_amount' => 500]);

        Sale::create(['movie_id' => 4, 'theater_id' => 9, 'date' => '2024-10-31', 'sales_amount' => 1400]);
        Sale::create(['movie_id' => 4, 'theater_id' => 9, 'date' => '2024-11-01', 'sales_amount' => 900]);
        Sale::create(['movie_id' => 4, 'theater_id' => 9, 'date' => '2024-11-02', 'sales_amount' => 800]);
        Sale::create(['movie_id' => 4, 'theater_id' => 9, 'date' => '2024-11-02', 'sales_amount' => 900]);
        Sale::create(['movie_id' => 4, 'theater_id' => 9, 'date' => '2024-11-03', 'sales_amount' => 900]);
        Sale::create(['movie_id' => 4, 'theater_id' => 9, 'date' => '2024-10-30', 'sales_amount' => 1200]);
        Sale::create(['movie_id' => 4, 'theater_id' => 9, 'date' => '2024-10-29', 'sales_amount' => 1000]);

       
    }
}

