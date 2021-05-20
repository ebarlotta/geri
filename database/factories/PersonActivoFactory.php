<?php

namespace Database\Factories;

use App\Models\PersonActivo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonActivoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonActivo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'estado' => $this->$estado,
                ];
        // return [
        //     'estado' => 'Activo',
        //     'estado' => 'Baja',
        //     'estado' => 'En proceso de baja',
        // ];

    }
}
