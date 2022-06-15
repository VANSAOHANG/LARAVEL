<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "company_name" => $this->faker->company,
            "email" => $this->faker->unique()->email,
            "barcode" => $this->faker->ean8,
            "expired_date" => $this->faker->date(),
            "phoneNumber" => $this->faker->phoneNumber,
        ];
    }
}
