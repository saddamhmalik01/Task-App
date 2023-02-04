<?php

namespace Database\Factories;

use App\Enums\TaskStatusEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TasksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=> fake()->sentence(),
            'description'=> fake()->paragraph(),
            'due_date' => Carbon::now()->addDays(rand(min([1]),max([100]))),
            'status' => TaskStatusEnum::Pending,
        ];
    }
}
