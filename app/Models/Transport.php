<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'name',
        'type',
        'description',
        'price_per_hour',
        'price_per_day',
        'location',
        'is_active'
    ];

    protected $casts = [
        'price_per_hour' => 'decimal:2',
        'price_per_day' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function typeModel()
    {
        return $this->belongsTo(TransportType::class, 'type', 'slug');
    }

    public function responses()
    {
        return $this->hasMany(Response::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
