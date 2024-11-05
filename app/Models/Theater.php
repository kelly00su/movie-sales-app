<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    protected $table = "theaters";
    protected $fillable = ['name', 'location'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
