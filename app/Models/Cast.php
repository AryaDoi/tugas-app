<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'age',
        'biodata',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'cast_movies', 'cast_id', 'movie_id');
    }
}
