<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    protected $primaryKey = 'review_id';

    protected $fillable = [
        'movie_id',
        'user_id',
        'rating',
        'review',
    ];

    protected $casts = ['review_date' => 'datetime'];

    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id', 'movie_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id' , 'user_id');
    }
}
