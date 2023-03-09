<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_day = [
            [
                'course_id' => 1,
                'day_id' => 1,
                'open_time' => Carbon::createFromTime(8,30,00),
                'close_time' => Carbon::createFromTime(11,30,00),
                'building' => "FEB",
                'room' => 'D204',
            ],
            [
                'course_id' => 2,
                'day_id' => 1,
                'open_time' => Carbon::createFromTime(11,30,00),
                'close_time' => Carbon::createFromTime(14,30,00),
                'building' => "FEB",
                'room' => "D204",
            ],
            [
                'course_id' => 3,
                'day_id' => 4,
                'open_time' => Carbon::createFromTime(11,30,00),
                'close_time' => Carbon::createFromTime(13,30,00),
                'building' => "MED",
                'room' => "A206",
            ],
            [
                'course_id' => 3,
                'day_id' => 5,
                'open_time' => Carbon::createFromTime(8,30,00),
                'close_time' => Carbon::createFromTime(10,30,00),
                'building' => "MED",
                'room' => "A206",
            ],
            [
                'course_id' => 4,
                'day_id' => 3,
                'open_time' => Carbon::createFromTime(14,30,00),
                'close_time' => Carbon::createFromTime(17,30,00),
                'building' => "FEB",
                'room' => "D205",
            ],
            [
                'course_id' => 5,
                'day_id' => 3,
                'open_time' => Carbon::createFromTime(8,30,00),
                'close_time' => Carbon::createFromTime(11,30,00),
                'building' => "MED",
                'room' => "A206",
            ],
            [
                'course_id' => 6,
                'day_id' => 4,
                'open_time' => Carbon::createFromTime(11,30,00),
                'close_time' => Carbon::createFromTime(14,30,00),
                'building' => "FEB",
                'room' => "D306",
            ],
        ];

        foreach ($course_day as $item){
            DB::table('course_day')->insert($item);
        }
    }
}
