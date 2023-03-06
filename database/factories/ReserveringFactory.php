<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservering>
 */
class ReserveringFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'voornaam' => $this->faker->firstName(),
            'achternaam' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'telefoon' => '0612345678',
            'datum' => '2023-03-04',
            'tijd' => $this->faker->time(),
            'aant_personen' => 5,
        ];
    }
}
