<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),  // Generate a random name
            'subscribtion_end_date' => $this->faker->dateTimeBetween('+1 month', '+1 year'),  // Generate a random date in the future (between 1 month and 1 year)
            'email' => $this->faker->email() 
        ];
    }
}
