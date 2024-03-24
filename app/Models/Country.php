<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'continent',
    ];

    public function trips()
    {
        return $this->belongsToMany(Trip::class, 'trip_has_country');
    }
}
