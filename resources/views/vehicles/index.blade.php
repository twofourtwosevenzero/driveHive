@extends('layouts.app')

@section('content')
<h1 class="text-center display-4" style="color: #d4af37;">Our Fleet</h1>
<p class="text-center mb-5" style="color: #9e9e9e;">Experience the ultimate drive with our premium selection of vehicles.</p>

<div class="row">
    @foreach ($vehicles as $vehicle)
        <div class="col-md-4 mb-4">
            <div class="card bg-dark text-white border-0 shadow-lg">
                <img src="https://via.placeholder.com/400x250" class="card-img-top" alt="Vehicle Image">
                <div class="card-body">
                    <h5 class="card-title text-uppercase font-weight-bold">{{ $vehicle->make }} {{ $vehicle->model }}</h5>
                    <p class="card-text">
                        Year: {{ $vehicle->year }} <br>
                        Rental Price: <span style="color: #d4af37;">₱{{ number_format($vehicle->rental_price, 2) }}</span>/day
                    </p>
                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-main btn-block">View Details</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $vehicles->links('pagination::bootstrap-4') }}
</div>
@endsection
