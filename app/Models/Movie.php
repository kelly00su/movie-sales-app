<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $table = "movies";
    protected $fillable = ['title', 'release_date'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}

