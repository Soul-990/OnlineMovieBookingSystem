<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theatre extends Model
{
    use HasFactory;

    protected $primaryKey = 'theatre_id';

    protected $fillable = [
        'theatre_name',
        'city',
        'address',
        'contact_no',
    ];

    
}
