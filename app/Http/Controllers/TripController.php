<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripPostRequest;
use App\Http\Requests\TripStoreRequest;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

    public function store(TripPostRequest $request){
        $validated = $request->validated();

        dd('test');
        if (!$validated['duration_in_days']) {
            $validated['duration_in_days'] = $validated['endDate']->diffInDays($validated['startDate']) + 1;
        }
        $trip = new Trip($validated);
        $trip->save();

        return redirect('/trips')->with('success', 'Trip created successfully!');
    }
}
