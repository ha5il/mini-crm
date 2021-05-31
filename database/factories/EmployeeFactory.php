<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => random_int(0, 1) ? $this->faker->email : null,
            'phone' => random_int(0, 1) ? random_int(9800000000, 9999999999) : null,
            'company_id' => random_int(1, Company::orderBy('id', 'desc')->first(['id'])->id),
        ];
    }
}
