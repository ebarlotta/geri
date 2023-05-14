<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Empresa;

class UnidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'empresa_id' => Empresa::inRandomOrder()->value('id') ?: Empresa::factory(1)->create(),
        ];
    }
}
