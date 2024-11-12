<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\BoardsCategory;
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
            './img/king god sejong.jpg',
            './img/me.jpg',
            './img/라스무스 러도프.png',
            './img/몬티 와이드니어스.png',
            './img/테일러 오트웰.png'
        ];

        $userInfo = User::inRandomOrder()->first();
        $date = $this->faker->dateTimeBetween('-1 years');
        return [
            'u_id' => $userInfo->u_id
            ,'bc_type' => BoardsCategory::inRandomOrder()->first()->bc_type
            ,'b_title' => $this->faker->realText(50)
            ,'b_content' => $this->faker->realText(200)
            ,'b_img' => Arr::random($arrImg)
            ,'created_at' => $date
            ,'updated_at' => $date

        ];
    }
}
