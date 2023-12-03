<?php

namespace Database\Factories;

use App\Models\TipoUser;
use Illuminate\Database\Eloquent\Factories\Factory;

class TipoUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_user' => $this->faker->unique()->randomElement(['cliente', 'crítico', 'admin']),
        ];
    }
}
