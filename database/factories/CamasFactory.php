<?php

namespace Database\Factories;

use App\Models\Camas;
use Illuminate\Database\Eloquent\Factories\Factory;

class CamasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Camas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nrohabitacion' => $this->faker->numberBetween(1,10),
            'nrocama' => $this->faker->unique()->numberBetween(1,100),
            'estadocama' => $this->faker->randomElement([0,1]),
            'sexocama' => $this->faker->randomElement([1,2,3]),
        ];
    }
}
