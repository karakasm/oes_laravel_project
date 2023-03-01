<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Turab',
                'surname' => 'Karakaş',
                'username' => 'karakasm18',
                'role' => 'student',
                'password' => Hash::make('Mx8pkMe0FC')
            ],
            [
                'name' => 'Akif',
                'surname' => 'Mete',
                'username' => 'mete16',
                'role' => 'student',
                'password' => Hash::make('Nwakaeme61')
            ],
            [
                'name' => 'Sultan',
                'surname' => 'Erdoğan',
                'username' => 'erdogan15',
                'role' => 'instructor',
                'password' => Hash::make('Serdogan15')
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
