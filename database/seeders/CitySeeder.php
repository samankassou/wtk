<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::insert([
            ['name' => 'Garoua'],
            ['name' => 'Bertoua'],
            ['name' => 'Douala'],
            ['name' => 'Maroua'],
            ['name' => 'Bafoussam'],
            ['name' => 'Bamenda'],
            ['name' => 'Yaoundé'],
            ['name' => 'Ngaoundéré'],
            ['name' => 'Buéa'],
            ['name' => 'Kribi'],
            ['name' => 'Limbé']
        ]);
    }
}
