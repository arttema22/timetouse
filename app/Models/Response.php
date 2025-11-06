<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id',
        'transport_id',
        'owner_id',
        'price_offered',
        'message',
        'status'
    ];

    protected $casts = [
        'price_offered' => 'decimal:2',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
