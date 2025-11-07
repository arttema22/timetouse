<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransportType extends Model
{
    /** @use HasFactory<\Database\Factories\TransportTypeFactory> */
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function transports(): HasMany
    {
        return $this->hasMany(Transport::class, 'type', 'slug');
    }
}
