<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_user = [
            [
                'user_id' => 1,
                'course_id' => 1,
            ],
            [
                'user_id' => 1,
                'course_id' => 2,
            ],
            [
                'user_id' => 1,
                'course_id' => 3,
            ],
            [
                'user_id' => 1,
                'course_id' => 4,
            ],
            [
                'user_id' => 1,
                'course_id' => 5,
            ],
            [
                'user_id' => 2,
                'course_id' => 1,
            ],
            [
                'user_id' => 2,
                'course_id' => 2,
            ],
            [
                'user_id' => 2,
                'course_id' => 3,
            ],
            [
                'user_id' => 2,
                'course_id' => 4,
            ],
            [
                'user_id' => 2,
                'course_id' => 5,
            ],
        ];

        foreach ($course_user as $item) {
            DB::table('course_user')->insert($item);
        }

        for ($i = 5; $i < 16; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $course_user =
                    [
                        'user_id' => $i,
                        'course_id' => $j,
                    ];
                DB::table('course_user')->insert($course_user);
            }
        }
    }
}
