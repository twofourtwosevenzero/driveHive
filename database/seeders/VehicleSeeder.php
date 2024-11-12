<?php

namespace Database\Seeders;

// database/seeders/VehicleSeeder.php
use Illuminate\Database\Seeder;
use App\Models\Vehicle;

class VehicleSeeder extends Seeder
{
    public function run()
    {
        Vehicle::insert([
            [
                'make' => 'Toyota',
                'model' => 'Vios',
                'year' => 2021,
                'rental_price' => 1000,
                'availability_status' => true,
            ],
            [
                'make' => 'Mitsubishi',
                'model' => 'Mirage',
                'year' => 2020,
                'rental_price' => 900,
                'availability_status' => true,
            ],
            [
                'make' => 'Toyota',
                'model' => 'Innova',
                'year' => 2019,
                'rental_price' => 1500,
                'availability_status' => true,
            ],
            [
                'make' => 'Hyundai',
                'model' => 'Accent',
                'year' => 2021,
                'rental_price' => 950,
                'availability_status' => true,
            ],
            [
                'make' => 'Nissan',
                'model' => 'Almera',
                'year' => 2020,
                'rental_price' => 1000,
                'availability_status' => true,
            ],
            [
                'make' => 'Toyota',
                'model' => 'Hiace',
                'year' => 2018,
                'rental_price' => 2000,
                'availability_status' => true,
            ],
            [
                'make' => 'Isuzu',
                'model' => 'Crosswind',
                'year' => 2017,
                'rental_price' => 1400,
                'availability_status' => true,
            ],
            [
                'make' => 'Ford',
                'model' => 'Ranger',
                'year' => 2021,
                'rental_price' => 1800,
                'availability_status' => true,
            ],
            [
                'make' => 'Honda',
                'model' => 'City',
                'year' => 2021,
                'rental_price' => 1100,
                'availability_status' => true,
            ],
            [
                'make' => 'Suzuki',
                'model' => 'Ertiga',
                'year' => 2019,
                'rental_price' => 1300,
                'availability_status' => true,
            ],
            // Add more vehicles as needed
        ]);
    }
}
