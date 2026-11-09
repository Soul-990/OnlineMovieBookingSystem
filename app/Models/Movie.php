<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Movie extends Model
{
    use HasFactory;

    protected $primaryKey = 'movie_id';

    protected $fillable = [
        'movie_name',
        'description',
        'genre',
        'language',
        'duration',
        'release_date',
        'poster',
        'trailer_link',
        'status',
    ];

    protected $casts = ['release_date' => 'date'];

    public function reviews()
    {
        return $this->hasMany(Review::class, 'movie_id', 'movie_id');
    }
    public function shows()
    {
        return $this->hasMany(Show::class, 'movie_id', 'movie_id');
    }
}
