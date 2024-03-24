<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();

        return view('trips', compact('trips'));
    }

    public function show(Trip $trip)
    {
        //$this->authorize('view', $association);

        $trip = Trip::whereId($trip->id)->first();


        return view('trip', compact('trip'));

    }

    public function create()
    {
        return view('create-trip');
    }
}
