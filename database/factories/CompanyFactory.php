<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id'=>User::where('userType','company')->get()->unique()->random()->id,
            'address'=>$this->faker->city                                ,                          
            'phone'=>'0777777777',
            'website'=>$this->faker->domainName,
            'description'=>$this->faker->paragraph($nbSentences = 10, $variableNbSentences = true)

        ];
    }
}
