@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <img src="https://via.placeholder.com/600x400" class="img-fluid rounded shadow-lg" alt="Vehicle Image">
    </div>
    <div class="col-md-6">
        <h2 class="text-uppercase font-weight-bold" style="color: #d4af37;">{{ $vehicle->make }} {{ $vehicle->model }}</h2>
        <p style="color: #9e9e9e;">Year: {{ $vehicle->year }}</p>
        <p style="color: #fff;">Rental Price: <span style="color: #d4af37;">₱{{ number_format($vehicle->rental_price, 2) }}</span> per day</p>
        <hr class="bg-light">
        <form action="{{ route('vehicles.book', $vehicle->id) }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="start_date" class="form-label" style="color: #9e9e9e;">Start Date</label>
                <input type="date" id="start_date" name="start_date" class="form-control bg-dark text-white border-0">
            </div>
            <div class="form-group mb-3">
                <label for="end_date" class="form-label" style="color: #9e9e9e;">End Date</label>
                <input type="date" id="end_date" name="end_date" class="form-control bg-dark text-white border-0">
            </div>
            <button type="submit" class="btn btn-main btn-block">Book Now</button>
        </form>
    </div>
</div>
@endsection
