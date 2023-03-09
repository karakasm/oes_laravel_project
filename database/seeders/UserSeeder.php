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
                'role_id' => 3,
                'name' => 'Turab',
                'surname' => 'Karakaş',
                'username' => 'karakasm18',
                'password' => Hash::make('Mx8pkMe0FC')
            ],
            [
                'role_id' => 3,
                'name' => 'Akif',
                'surname' => 'Mete',
                'username' => 'mete16',
                'password' => Hash::make('Nwakaeme61')
            ],
            [
                'role_id' => 2,
                'name' => 'Sultan',
                'surname' => 'Erdoğan',
                'username' => 'erdogan15',
                'password' => Hash::make('Serdogan15')
            ],
            [
                'role_id' => 2,
                'name' => 'İzzet',
                'surname' => 'Göksel',
                'username' => 'gokseli10',
                'password' => Hash::make('Gokseliz10')
            ]
        ];

        foreach ($users as $user){
            User::create($user);
        }
    }
}
