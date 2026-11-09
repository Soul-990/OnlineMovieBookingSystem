<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;

    protected $primaryKey = 'show_id';

    protected $fillable = [
        'movie_id',
        'theatre_id',
        'show_date',
        'show_time',
        'gold_price',
        'platinum_price',
        'box_price',
        'gold_seats',
        'platinum_seats',
        'box_seats',
    ];

    protected $casts = ['show_date' => 'date'];

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }

     public function theatre(){
        return $this->belongsTo(Theatre::class, 'theatre_id', 'theatre_id');
    }

    
}
