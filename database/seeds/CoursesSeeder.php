<?php

use App\Course;
use Illuminate\Database\Seeder;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course1 = Course::create([
            "name" => "MongoDB",
            "content" => "MongoDB is no sql database"
        ]);

        $course2 = Course::create([
            "name" => "Laravel",
            "content" => "Laravel is a PHP Framework"
        ]);
    }
}
