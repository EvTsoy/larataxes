<?php

namespace Database\Factories;

use App\Models\Salary;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalaryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Salary::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'oklad' => $this->faker->randomFloat(2, 15000, 100000),
            'norma_in_month' => 22,
            'otrabotano_days' => $this->faker->numberBetween(15, 22),
            'nalog_vichet' => $this->faker->boolean(50),
            'calendar_god' => 2001,
            'calendar_month' => $this->faker->numberBetween(1, 12),
            'is_pensioner' => $this->faker->boolean(30),
            'is_disabled_person' => $this->faker->numberBetween(0, 3)
        ];
    }
}
