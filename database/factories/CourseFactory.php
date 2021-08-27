<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'icon' => $this->faker->imageUrl(),
            'times' => 80,
            'quizzes' => $this->faker->numberBetween(1, 20000),
            'price' => $this->faker->randomFloat(0.01, 0, 1000000),
            'description' => $this->faker->paragraph
        ];
    }
}
