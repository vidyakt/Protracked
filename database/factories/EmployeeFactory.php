<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $companyIds = [1,2,3,4,5,6,7,8,9,10];
        return [
            'company_id' => $this->faker->randomElement($companyIds),
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber
        ];
    }
}
