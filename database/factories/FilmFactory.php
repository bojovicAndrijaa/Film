<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Reziser;
use App\Models\User;
use Faker\Factory as Faker;


class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->word(),
            'duration'=>$this->faker->numberBetween(30,180),
            'award'=>$this->faker->word(),
            
            'user_id'=>User::factory(),
            'reziser_id'=>Reziser::factory(),
            'kategorija_id'=>$this->faker->numberBetween(1,9),
            
        ];
    }
}
