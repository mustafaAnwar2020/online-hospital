<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HospitalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->company(),
            'address'=>$this->faker->address(),
            'phone'=>$this->faker->phoneNumber(),
            'bio'=>$this->faker->text(50)
        ];
    }
}
