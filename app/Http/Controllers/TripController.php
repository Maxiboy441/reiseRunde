<?php

namespace App\Http\Controllers;

use App\Http\Requests\Test;
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
        $user_id = Auth::id();

        $trips = Trip::whereDoesntHave('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })
            ->whereHas('users', function ($query) {
                $query->where('status', 'waiting');
            })
            ->paginate(9); // Paginate with 9 trips per page

        return view('trips', compact('trips'));
    }

    public function show(Trip $trip)
    {

        $trip = Trip::whereId($trip->id)->first();


        return view('trip', compact('trip'));

    }

    public function indexMine()
    {
        $user_id = Auth::id();
        $openTripOwner = Trip::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type', 'owner')
                ->where('status', 'waiting');
        })->get();

        $closedTripOwner = Trip::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type', 'owner')
                ->where('status', 'closed');
        })->get();

        $doneTripOwner = Trip::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type', 'owner')
                ->where('status', 'done');
        })->get();

        $openJoinedTrip = Trip::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type', '!=', 'owner')
                ->where('status', 'waiting');
        })->get();

        $closedJoinedTrip = Trip::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type', '!=', 'owner')
                ->where('status', 'closed');
        })->get();

        $doneJoinedTrip = Trip::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type', '!=', 'owner')
                ->where('status', 'done');
        })->get();

        $askingJoinedTrip = Trip::whereHas('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)
                ->where('type', '!=', 'owner')
                ->where('status', 'asking');
        })->get();


        return view('my-trips', compact('openTripOwner','closedTripOwner','doneTripOwner','openJoinedTrip', 'closedJoinedTrip', 'doneJoinedTrip','askingJoinedTrip'));

    }

    public function create()
    {
        return view('create-trip');
    }

    public function store(TripPostRequest $request)
    {
        $validated = $request->validated();

        if (!request('duration_in_days')) {
            $carbonDate1 = Carbon::parse($validated['startDate']);
            $carbonDate2 = Carbon::parse($validated['endDate']);
            $validated['duration_in_days'] = $carbonDate1->diffInDays($carbonDate2) + 1;
        }

        $trip = Trip::create($validated);

        DB::table('user_has_trip')->insert([
            'user_id' => Auth::id(),
            'trip_id' => $trip->id,
            'type' => 'owner',
            'status' => 'waiting'
        ]);

        return redirect('/trips')->with('success', 'Trip created successfully!');
    }

    public function joinTrip(Trip $trip){

        DB::table('user_has_trip')->insert([
            'user_id' => Auth::id(),
            'trip_id' => $trip->id,
            'type' => 'guest',
            'status' => 'asking'
        ]);

        return redirect('trips');
    }
}
