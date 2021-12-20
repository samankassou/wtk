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
            'is_super_user'  => 1,
            'remember_token' => Str::random(10),
            'social_links'   => [
                'facebook' => "",
                'twitter'  => "",
                'linkedin' => ""
            ],

        ]);

        User::create([
            'name'           => 'Agent 1',
            'email'          => 'agent1@agent.com',
            'username'       => 'agent1',
            'password'       => bcrypt('password'),
            'role'           => 'agent',
            'phone'          => '237691565877',
            'remember_token' => Str::random(10),
            'social_links'   => [
                'facebook' => "",
                'twitter'  => "",
                'linkedin' => ""
            ],

        ]);
    }
}
