<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-1 years');//2023년~2024년, 사실상 오늘날짜로부터 1년전
        return [
            'u_email' => $this->faker->unique()->safeEmail(), //php faker 사용, 영어로 동작(config에서 ko로 설정)
            'u_password' => Hash::make('asdf1234'),
            'u_name' => $this->faker->name(),
            'created_at'=> $date,
            'updated_at'=> $date
            
            //레코더 하나에 대한 데이터
        ];
    }


}
