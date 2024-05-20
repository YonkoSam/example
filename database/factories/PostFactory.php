<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomEmployerId = Employer::inRandomOrder()->first()->id;

        return [
            'Title' =>  fake() -> realText(),
            'employer_id' => $randomEmployerId,
            'Description' =>  fake()->realText()
        ];
    }
}
