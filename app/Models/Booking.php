<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payments;

class Booking extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'user_id',
        'show_id',
        'seat_class',
        'adult_tickets',
        'kid_tickets',
        'total_amount',
        'booking_date',
        'booking_status',
    ];

    protected $casts = ['booking_date' => 'datetime'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function show()
    {
        return $this->belongsTo(Show::class, 'show_id', 'show_id');
    }

    public function payment()
    {
        return $this->hasOne(Payments::class, 'booking_id', 'booking_id');
    }
}
