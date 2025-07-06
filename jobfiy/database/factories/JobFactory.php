<?php

namespace Database\Factories;

use App\Models\Employer;
use Illuminate\Container\Attributes\Log;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{

public function definition(): array
{
    $employer = Employer::factory()->create();
    

    return [
        'employer_id' => $employer->id, // Force concrete ID
        'title' => fake()->jobTitle(),
        'salary' => '$'.fake()->numberBetween(30000, 120000),
    ];
}
}
