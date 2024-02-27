<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Persona::class;

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
            'alias' => $this->faker->word,
            'documento' => $this->faker->numberBetween(1000000,4000000),
            'domicilio'=> $this->faker->streetName . $this->faker->buildingNumber,
            'sexo_id'=> $this->faker->randomElement([1,2,3]),
            'cama_id'=> $this->faker->randomElement([1,2,3]),
            'nacionalidad_id'=> 1,
            'localidad_id' => $this->faker->randomElement([1,2]),
            'estado_id' => $this->faker->randomElement([1,2]),
            'beneficio_id' => $this->faker->randomElement([1,2]),
            'tipodocumento_id' => $this->faker->randomElement([1,2]),
            'estadocivil_id'=> $this->faker->randomElement([1,2,3]),
            'tipopersona_id' => $this->faker->randomElement([1,2]),
            'gradodependencia_id' => $this->faker->randomElement([1,2]),
            'escolaridad_id' => $this->faker->randomElement([1,2]),
            'url' => 'Sin_imagen.jpg',
        ];
    }
}
