<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            
            'name' => $this->faker->name(),
            'pregnancies' => $this->faker->randomDigit(),
            'glucose' => $this->faker->randomDigit(),
            'bloodpressure' => $this->faker->randomDigit(),
            'skinthickness' => $this->faker->randomDigit(),
            'insulin' => $this->faker->randomDigit(),
            'bmi' => $this->faker->randomDigit(),
            'diabetespedegreefunction' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 5),
            'age' => $this->faker->randomDigit(),
            'diagnosis'=>$this->faker->randomDigit(),
            'user_id' => $this->faker->randomDigitNot(0,2,3,4,5,6,7,8,9)
        ];
    }
}
