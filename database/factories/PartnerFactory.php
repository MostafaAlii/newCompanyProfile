<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
class PartnerFactory extends Factory {
    public function definition() {
        return [
            'name' => $this->faker->name,
            'link' => $this->faker->unique()->url,
            'status' => $this->faker->randomElement([0, 1]),
        ];
    }
}
