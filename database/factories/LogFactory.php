<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'instructor_id' => '1',
            'customer_id' => rand( 1, 10),
            'num' => rand( 1, 100),
            'date' => date('Y-m-d'),
            'entry_time' => date('H:i'),
            'exit_time' => date('H:i'),
            'swim_time' => '00:40',
            'entry' => rand(1, 2),
        ];
    }
}
