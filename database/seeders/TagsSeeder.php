<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tags;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tags::factory(100)->create();
    }
}
