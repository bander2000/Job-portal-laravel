<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CatogryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $arr = array('tour','cms','report','app','helmet','high-tech','real-estate','content');
        $randomItems = Arr::random($arr);
        return [
            'name'=>$this->faker->name,
            'icon'=>$randomItems
        ];
    }
}
