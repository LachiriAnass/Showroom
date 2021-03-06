<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0; $i<=20; $i++):
            DB::table('galleries')
                ->insert([
                    'title' => $faker->sentence,
                    'description' => $faker->paragraph,
                    'image' => 'default.jpg',
                    'user_id' => $faker->numberBetween($min = 1, $max = 18),
                    'votes_average' => 0,
                    'created_at' => new DateTime,
                    'updated_at' => null,
                ]);
        endfor;
    }
}
