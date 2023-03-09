<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() : void
    {
        $this->call([
            RoleSeeder::class,
            DaySeeder::class,
            UserSeeder::class,
            CourseSeeder::class,
            CourseUserSeeder::class,
            CourseDaySeeder::class,
        ]);
    }
}
