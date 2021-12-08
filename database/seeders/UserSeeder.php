<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'           => 'admin',
            'email'          => 'admin@admin.com',
            'username'       => 'admin',
            'password'       => bcrypt('admin'),
            'role'           => 'admin',
            'remember_token' => Str::random(10),
            'social_links'   => [
                'facebook' => "",
                'twitter'  => "",
                'linkedin' => ""
            ],

        ]);
    }
}
