<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<App\Models\Job>
 */
class JobTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $randomJobId = Job::inRandomOrder()->first()->id;
        $randomTagId = Tag::inRandomOrder()->first()->id;

        return [

            'job_listings_id' => $randomJobId,
            'tag_id' => $randomTagId,

        ];
    }
}
