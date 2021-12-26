<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class PatientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker=Faker\Factory::create();
        for($i = 0; $i < 1000; $i++) {
            App\Patient::create([
                'user_id' => $faker->randon,
                'name' => $faker->name,
                'pregnancies' => $faker->email,
                'glucose' => $faker->email,
                'bloodpressure' => $faker->email,
                'skinthickness' => $faker->email,
                'insulin' => $faker->email,
                'bmi' => $faker->email,
                'diabetespedegreefunction' => $faker->randomFloat(),
                'age' => $faker->email
            ]);
        }
    }
}
