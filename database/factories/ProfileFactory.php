<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::all()->unique()->random()->id,
            'address'=>$this->faker->city,
            'gender'=>'Male',
            'dob'=>$this->faker->date($format = 'Y-m-d', $max = 'now'),
            'experince'=>$this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
            'bio'=>$this->faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ];
    }
}
