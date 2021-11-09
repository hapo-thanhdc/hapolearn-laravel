<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(CourseTagSeeder::class);
        $this->call(UserCourseSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(UserLessonSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(TagsSeeder::class);
    }
}
