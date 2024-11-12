<!-- resources/views/vehicles/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Vehicle</h1>

    <form action="{{ route('vehicles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="make">Make</label>
            <input type="text" name="make" id="make" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" name="model" id="model" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" class="form-control" min="1900" max="{{ date('Y') }}" required>
        </div>
        <div class="form-group">
            <label for="rental_price">Rental Price</label>
            <input type="number" name="rental_price" id="rental_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="availability_status">Availability</label>
            <select name="availability_status" id="availability_status" class="form-control">
                <option value="1">Available</option>
                <option value="0">Not Available</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Add Vehicle</button>
    </form>
</div>
@endsection
