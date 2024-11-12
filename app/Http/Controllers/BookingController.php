<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function store(Request $request)
{
    if (!auth()->check()) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    $request->validate([
        'vehicle_id' => 'required|exists:vehicles,id',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

    $vehicle = Vehicle::findOrFail($request->vehicle_id);
    $startDate = Carbon::parse($request->start_date);
    $endDate = Carbon::parse($request->end_date);

    // Check for overlapping bookings
    $overlap = Booking::where('vehicle_id', $vehicle->id)
        ->where(function($query) use ($startDate, $endDate) {
            $query->whereBetween('start_date', [$startDate, $endDate])
                  ->orWhereBetween('end_date', [$startDate, $endDate])
                  ->orWhere(function ($query) use ($startDate, $endDate) {
                      $query->where('start_date', '<=', $startDate)
                            ->where('end_date', '>=', $endDate);
                  });
        })
        ->exists();

    if ($overlap) {
        return response()->json(['error' => 'Vehicle is already booked for these dates.'], 422);
    }

    // Proceed to create booking if no overlap
    $daysRented = $endDate->diffInDays($startDate);
    $totalPrice = $vehicle->rental_price * $daysRented;

    $booking = Booking::create([
        'user_id' => auth()->id(),
        'vehicle_id' => $vehicle->id,
        'start_date' => $startDate,
        'end_date' => $endDate,
        'total_price' => $totalPrice,
        'status' => 'pending',
    ]);

    return response()->json($booking, 201);
}



}
