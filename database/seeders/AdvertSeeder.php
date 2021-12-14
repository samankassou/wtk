<?php

namespace Database\Seeders;

use App\Models\Advert;
use Illuminate\Database\Seeder;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advert = Advert::create([
            'title' => 'Chambre moderne à Bonamoussadi',
            'description' => 'Chambre assez grande avec toilette moderne, pas loin d\'un forage',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus autem voluptatibus
                                alias repellat? Ullam, iste, illo iure qui rerum eos laboriosam explicabo velit ipsam incidunt ab possimus
                                dolor quidem et.',
            'location'            => 'Bonamoussadi, Douala',
            'moderation_status'   => 'approved',
            'latitude'            => '43.222732',
            'longitude'           => '-76.105523',
            'number_of_bedrooms'  => 1,
            'number_of_bathrooms' => 1,
            'square'              => 3,
            'price'               => 35000,
            'features'            => ['Security', 'Balcon'],
            'is_featured'         => 1,
            'status'              => 'renting',
            'visit_fees'          => 5000,
            'city_id'             => 3,
            'user_id'             => 1,
            'created_by'          => 1
        ]);

        $advert->categories()->attach([1]);

        $advert->addMediaFromUrl(url('/assets/img/example-image.jpg'))
        ->toMediaCollection('images');
    }
}
