<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $randomPostId = Post::inRandomOrder()->first()->id;
        $randomTagId = Tag::inRandomOrder()->first()->id;

        return [

            'post_id' => $randomPostId,
            'tag_id' => $randomTagId,

        ];
    }
}
