<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $properties = [
            [
                "name" =>  "The Victoria",
                "price" =>  "374662",
                "bedrooms" => 4,
                "bathrooms" => 2,
                "storeys" => 2,
                "garages" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Xavier",
                "price" =>  "513268",
                "bedrooms" => 4,
                "bathrooms" => 2,
                "storeys" => 1,
                "garages" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Como",
                "price" =>  "454990",
                "bedrooms" => 4,
                "bathrooms" => 3,
                "storeys" => 2,
                "garages" => 3,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Aspen",
                "price" =>  "384356",
                "bedrooms" => 4,
                "bathrooms" => 2,
                "storeys" => 2,
                "garages" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Lucretia",
                "price" =>  "572002",
                "bedrooms" => 4,
                "bathrooms" => 3,
                "storeys" => 2,
                "garages" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Toorak",
                "price" =>  "521951",
                "bedrooms" => 5,
                "bathrooms" => 2,
                "storeys" => 1,
                "garages" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Skyscape",
                "price" =>  "263604",
                "bedrooms" => 3,
                "bathrooms" => 2,
                "storeys" => 2,
                "garages" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Clifton",
                "price" =>  "386103",
                "bedrooms" => 3,
                "bathrooms" => 2,
                "storeys" => 1,
                "garages" => 1,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "name" =>  "The Geneva",
                "price" =>  "390600",
                "bedrooms" => 4,
                "bathrooms" => 3,
                "storeys" => 2,
                "garages" => 2,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ];

        DB::table('properties')->insert($properties);
    }
}
