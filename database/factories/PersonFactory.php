<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Person::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'nacimiento' => $this->faker->date(),
            'estado_id' => $this->faker->randomElement([0,1,2]),
            'alias' => $this->faker->word,
            'beneficio_id' => $this->faker->randomElement([0,1,2]),
            'documento' => $this->faker->numberBetween(100000,4000000),
            'idtipodocumento' => $this->faker->randomElement([0,1,2]),
            'domicilio'=> $this->faker->streetName . $this->faker->buildingNumber,
            'localidad' => $this->faker->state,
            'sexo'=> $this->faker->randomElement([0,1,2]),
            'nacionalidad'=> $this->faker->country,
            'estadocivil_id'=> $this->faker->randomElement([0,1,2,3]),
            'tipopersona_id' => $this->faker->randomElement([0,1]),
        ];
    }
}
