<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = [
        'destination',
        'startDate',
        'endDate',
        'timespan',
        'description',
        'vehicle',
        'image_link',
        'trip_link',
        'name',
        'max_travelers',
        'min_travelers'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'startDate' => 'date',
        'endDate' => 'date',
        'timespan' => 'boolean',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_has_trip')
            ->withPivot('type', 'status');
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'trip_has_country');
    }
}
