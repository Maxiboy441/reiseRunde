<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TripPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // You can modify this based on your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'timespan' => 'required',
            'duration_in_days' => 'sometimes|integer|min:1',
            'description' => 'nullable|string',
            'vehicle' => 'nullable|string|max:255',
            'image_link' => 'nullable|string',
            'trip_link' => 'nullable|string',
            'max_travelers' => 'required|integer|min:1',
            'min_travelers' => 'required|integer|min:1|lte:max_travelers',
        ];
    }
}
