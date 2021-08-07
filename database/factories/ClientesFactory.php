<?php

namespace Database\Factories;

use App\Models\Clientes;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clientes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'apellidos' => $this->faker->word(),
            'telefono' => $this->faker->randomNumber(9),
            'email' => $this->faker->email(),
            'direccion' => $this->faker->text(),
            'foto' => $this->faker->word(),
        ];
    }
}
