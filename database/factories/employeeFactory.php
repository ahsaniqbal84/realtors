<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\employee>
 */
class employeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'gender' => fake()->randomElement(['m','f']),
            'code' => fake()->unique()->numberBetween(1,99999),
            'manager_id' => 1,
            'office_id'=> fake()->numberBetween(1,2),
            'department_id'=> fake()->numberBetween(1,3),
            'designation_id'=> fake()->numberBetween(1,4),
            'join_date' => fake()->dateTimeBetween('-1 year','now'),
            'mobile_number' => fake()->phoneNumber(),
            'city' => fake()->city(),
            'status' => fake()->randomElement([0,1]),
        ];
    }
}
