<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            [
               'instructor_id' => 3,
               'name' => 'Finansal Matematik',
               'code' => 'MAT',
               'number' => '471',
               'language' => 'Turkish',
               'aim' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra ipsum nec faucibus placerat. Etiam tincidunt consectetur turpis ut cursus.',
                'credit' => 3,
                'capacity' => 40,
                'enrolled' => 0,

            ],
            [
                'instructor_id' => 3,
                'name' => 'Veri Analizi',
                'code' => 'MAT',
                'number' => '280',
                'language' => 'Turkish',
                'aim' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra ipsum nec faucibus placerat. Etiam tincidunt consectetur turpis ut cursus.',
                'credit' => 3,
                'capacity' => 40,
                'enrolled' => 0,

            ],
            [
                'instructor_id' => 4,
                'name' => 'Algebra',
                'code' => 'MAT',
                'number' => '340',
                'language' => 'English',
                'aim' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra ipsum nec faucibus placerat. Etiam tincidunt consectetur turpis ut cursus.',
                'credit' => 3,
                'capacity' => 40,
                'enrolled' => 0,

            ],
            [
                'instructor_id' => 4,
                'name' => 'Web Programming',
                'code' => 'MAT',
                'number' => '350',
                'language' => 'English',
                'aim' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra ipsum nec faucibus placerat. Etiam tincidunt consectetur turpis ut cursus.',
                'credit' => 3,
                'capacity' => 40,
                'enrolled' => 0,

            ],
            [
                'instructor_id' => 4,
                'name' => 'Sürekli Ortamlar Mekaniği',
                'code' => 'MUH',
                'number' => '310',
                'language' => 'Turkish',
                'aim' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra ipsum nec faucibus placerat. Etiam tincidunt consectetur turpis ut cursus.',
                'credit' => 3,
                'capacity' => 40,
                'enrolled' => 0,

            ],
            [
                'instructor_id' => 4,
                'name' => 'Sürekli Ortamlar Mekaniği',
                'code' => 'MUH',
                'number' => '310',
                'language' => 'English',
                'aim' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla viverra ipsum nec faucibus placerat. Etiam tincidunt consectetur turpis ut cursus.',
                'credit' => 3,
                'capacity' => 40,
                'enrolled' => 0,

            ],
        ];

        foreach ($courses as $course){
            Course::create($course);
        }
    }
}
