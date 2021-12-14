<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::insert([
            ['name' => 'Fitness center'],
            ['name' => 'Security'],
            ['name' => 'Garden'],
            ['name' => 'Parking'],
            ['name' => 'Terrace'],
            ['name' => 'Balcony'],
            ['name' => 'Wifi'],
            ['name' => 'Swimming pool'],
        ]);
    }
}
