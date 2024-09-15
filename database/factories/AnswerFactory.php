<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name,
            'gender' => $this->faker->numberBetween(1, 2),
            'age_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'email' => $this->faker->unique()->safeEmail,
            'is_send_email' => $this->faker->numberBetween(0, 1),
            'feedback' => $this->faker->realText(100),
        ];
    }
}
