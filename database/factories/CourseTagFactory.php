<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseTag;
use App\Models\Tags;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'tag_id' => Tags::all()->unique()->random()->id,
            'course_id' => Course::all()->unique()->random()->id,
        ];
    }
}
