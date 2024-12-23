<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Column;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Column>
 */
class ColumnFactory extends Factory
{

     protected $model = Column::class;

    public function definition()
    {
        return [
            'board_id' => Board::factory(),
            'title' => fake()->title(),
            'position' => fake()->numberBetween(1, 20),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
