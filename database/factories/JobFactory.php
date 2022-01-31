<?php

namespace Database\Factories;

use App\Models\Catogry;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Auth\User;

class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'company_id'=>Company::all()->unique()->random()->user_id,
            'catogry_id'=>Catogry::all()->unique()->random()->id,
            'title'=>$this->faker->jobTitle,
            'status'=>rand(0,1),
            'type'=>'Full-Time',
            'description'=>$this->faker->paragraph($nbSentences = 20, $variableNbSentences = true),
            'requiredKnowledge'=>$this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'education'=>$this->faker->paragraph($nbSentences = 5, $variableNbSentences = true),
            'location'=>$this->faker->country,
            'minSalary'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 200, $max = 400),
            'maxSalary'=>$this->faker->randomFloat($nbMaxDecimals = NULL, $min = 400, $max = 1000),
            'lastDate'=>$this->faker->dateTime
        ];
    }
}
