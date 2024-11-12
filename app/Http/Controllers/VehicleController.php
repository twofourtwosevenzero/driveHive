<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::paginate(6); // 6 vehicles per page
        return view('vehicles.index', compact('vehicles'));
    }
    
    public function create()
{
    return view('vehicles.create');
}

public function store(Request $request)
{
    $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'rental_price' => 'required|numeric|min:0',
        'availability_status' => 'required|boolean',
    ]);

    Vehicle::create($request->all());
    

    return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully.');
}

public function edit(Vehicle $vehicle)
{
    return view('vehicles.edit', compact('vehicle'));
}

public function update(Request $request, Vehicle $vehicle)
{
    $request->validate([
        'make' => 'required|string',
        'model' => 'required|string',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'rental_price' => 'required|numeric|min:0',
        'availability_status' => 'required|boolean',
    ]);

    $vehicle->update($request->all());

    return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
}

public function destroy(Vehicle $vehicle)
{
    $vehicle->delete();

    return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
}

public function show(Vehicle $vehicle)
{
    return view('vehicles.show', compact('vehicle'));
}

    }
