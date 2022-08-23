<?php

use App\Models\Tag;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tags = [
            'News',
            'Astronomy',
            'Cinema',
            'Music',
            'Videogames',
            'Photography'
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name'          => $tag,
                'description'   => $faker->paragraph()
            ]);
        }
    }
}
