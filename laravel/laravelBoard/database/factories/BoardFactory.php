<?php

namespace Database\Factories;

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
            '/img/hodu.jpg'
            ,'/img/hodu2.jpg'
            ,'/img/hodu4.jpg'
            ,'/img/hodu5.jpg'
            ,'/img/hodu6.jpg'
            ,'/img/ray.jpg'
            ,'/img/ray3.jpg'
            ,'/img/ray4.jpg'
            ,'/img/ray6.jpg'
            ,'/img/bong1.jpg'
            ,'/img/bong2.jpg'
            ,'/img/bong4.jpg'
            ,'/img/bong5.jpg'
            ,'/img/bong6.jpg'
            ,'/img/jja.jpg'
            ,'/img/jja1.jpg'
            ,'/img/jja2.jpg'
            ,'/img/jja4.jpg'
            ,'/img/jja6.jpg'
        ];
        $userInfo = User::inRandomOrder()->first();

        $date = $this->faker->dateTimeBetween('-1years');

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
