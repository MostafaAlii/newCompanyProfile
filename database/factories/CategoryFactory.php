<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class CategoryFactory extends Factory {
    public function definition()
    {
        return [
            'name'      => $this->faker->name,
            'slug'      => $this->faker->unique()->slug,
            'status'    => $this->faker->randomElement([0, 1]),
        ];
    }
}
