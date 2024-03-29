<?php

namespace App\Http\Controllers;

use App\Http\Requests\TripPostRequest;
use App\Models\Trip;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();

        return view('trips', compact('trips'));
    }

    public function show(Trip $trip)
    {

        $trip = Trip::whereId($trip->id)->first();


        return view('trip', compact('trip'));

    }

    public function create()
    {
        return view('create-trip');
    }

    public function store(TripPostRequest $request){
        $validated = $request;

        if (!$validated['duration_in_days']) {
            $carbonDate1 = Carbon::parse($validated['startDate']);
            $carbonDate2 = Carbon::parse($validated['endDate']);
            $validated['duration_in_days'] = $carbonDate1->diffInDays($carbonDate2) + 1;
        }

        $trip = Trip::create($validated->toArray());
        
        DB::table('user_has_trip')->insert([
            'user_id' => Auth::id(),
            'trip_id' => $trip->id,
            'type' => 'owner',
            'status' => 'waiting'
        ]);

        return redirect('/trips')->with('success', 'Trip created successfully!');
    }
}
