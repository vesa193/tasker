<?php

namespace Database\Factories;

use App\Models\Column;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Task::class;

    public function definition()
    {
        return [
            'column_id' => Column::factory(), // Generiše Column ID koristeći Column factory
            'title' => $this->faker->sentence(3), // Nasumičan naslov taska
            'description' => $this->faker->paragraph, // Nasumičan opis
            'position' => $this->faker->numberBetween(1, 20), // Nasumična pozicija unutar kolone
        ];
    }
}
