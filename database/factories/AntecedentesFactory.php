<?php

namespace Database\Factories;

use App\Models\Antecedente;
use Illuminate\Database\Eloquent\Factories\Factory;

class AntecedentesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Antecedente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            // 'an_tipo'            => $faker->an_tipo,
            // 'an_destipo'         => $faker->an_destipo,
            // 'an_codigo'          => $faker->an_codigo,
            // 'an_descripcion'     => $faker->an_descripcion,
        ];
    }
}
