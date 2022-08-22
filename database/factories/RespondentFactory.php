<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Respondent>
 */
class RespondentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fraction' => $this->faker->randomElement([
                'Fraksi Golkar',
                'Fraksi PDI-P',
                'Fraksi PKB-Hanura',
                'Fraksi PAN',
                'Fraksi PPP',
                'Fraksi PKS',
                'Fraksi Demokrat-Nasdem',
            ]),
            'gender' => $this->faker->randomElement(['Laki-Laki', 'Perempuan']),
            'ip_address' => $this->faker->ipv4
        ];
    }
}
