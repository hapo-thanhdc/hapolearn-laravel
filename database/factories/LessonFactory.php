<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'course_id' => Course::all()->random()->id,
            'name' => $this->faker->unique()->name,
            'times' => $this->faker->numberBetween(20, 100),
            'detail' => $this->faker->paragraph,
            'description' => $this->faker->paragraph,
            'requirement' => $this->faker->paragraph,
        ];
    }
}
