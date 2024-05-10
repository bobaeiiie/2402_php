<?php

namespace Database\Factories;

use App\Models\BoardName;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Board>
 */
class BoardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $arrImg = [
            '/public/img/cat1.png'
            ,'/public/img/cat2.png'
            ,'/public/img/cat3.png'
            ,'/public/img/cat4.png'
            ,'/public/img/cat5.png'
        ];

        return [
           'user_id' => User::inRandomOrder()->first()->id
           ,'type' => BoardName::inRandomOrder()->first()->type
           ,'title' => $this->faker->realText(50)
           ,'content' => $this->faker->realText(1000)
           ,'img' => Arr::random($arrImg)
        ];
    }
}
