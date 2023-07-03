<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ActorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name(),
            'documentotipo_id'=> $this->faker->randomElement([1,2,3]),
            'documentonro'=>$this->faker->numberBetween(20000000,40000000),
            'nacimiento'=> $this->faker->date(),
            'direccion'=> $this->faker->address(),
            'estadocivil_id' => $this->faker->randomElement([1,2,3]),
            'sexo_id' => $this->faker->randomElement([1,2,3]),
            'email'=> $this->faker->email(),
            'nacionalidad_id'=> $this->faker->randomElement([1,2,3]),
            'localidad_id'=> $this->faker->randomElement([1,2,3]),
            'obrasocial_id'=> $this->faker->randomElement([1,2,3]),
            'escolaridad_id'=> $this->faker->randomElement([1,2,3]),
            'telefono' => $this->faker->numberBetween(2634000000,2634999999),
            'avatar'=>'Sin_imagen.jpg',
            'empresa_id'=> $this->faker->randomElement([1,2,3]),
            'activo'=>true,
        ];
    }
}
