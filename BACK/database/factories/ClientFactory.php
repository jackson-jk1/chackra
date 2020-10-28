<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
require_once __DIR__ . '/../faker_data/document_number.php';

class ClientFactory extends Factory
{



    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cpfs = cpfs();
        return [
            'name' => $this->faker->name,
            'document_number' => $cpfs[array_rand($cpfs,1)],
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'defaulter'=> rand(0,1),
            'date_birth' =>$this->faker->date(),
            'sex' => rand(1,10) % 2 == 0 ? 'm':'f',
            'marital_status'=>rand(1,3),
            'physical_disable'=>rand(1,10) % 2 == 0 ? $this->faker->word: null,




            ];

    }
}
