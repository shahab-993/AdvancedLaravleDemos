<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model= Employee::class;
    public function definition(): array
    {
        return [
        'first_name'=>$this->faker->firstName,
        'last_name'=>$this->faker->lastName,
        'title_name'=>$this->faker->randomElement(['Mr','Ms','Mrs']),
        'has_passport'=>$this->faker->boolean,
        'salary'=>$this->faker->randomFloat(2,1000,5000),
        'birth_date'=>$this->faker->date(),
        'hire_date'=>$this->faker->date(),
        'notes'=>$this->faker->paragraph,
        'email'=>$this->faker->unique()->safeEmail,
        'phone_number'=>$this->faker->phoneNumber,
        'department_id'=>$this->faker->numberBetween(1,5),
        'country_id'=>$this->faker->numberBetween(1,5),


        ];
    }
}
