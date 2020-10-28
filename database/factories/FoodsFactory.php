<?php

namespace Database\Factories;

use App\Models\Foods;
use Illuminate\Database\Eloquent\Factories\Factory;

class FoodsFactory extends Factory
{

    protected $model = Foods::class;


    public function definition()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        return [
            "user_id" => \App\Models\User::factory(),
            "name" => $faker->foodName(),
            "description" => $this->faker->sentence
        ];
    }
}
