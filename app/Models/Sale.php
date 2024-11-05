<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table = "sales";
    protected $fillable = ['date', 'sales_amount', 'movie_id', 'theater_id'];

    // Define the relationship with the Movie model
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    // Define the relationship with the Theater model
    public function Theater()
    {
        return $this->belongsTo(Theater::class);
    }
}
