<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'name' => 'super-admin',
                'email' => 'super-admin@admin.com',
                'password' => '123456789',
                'phone' => '123456789',
                'address' => 'Ha noi',
                'gender' => 'male'
            ],
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => '123456789',
                'phone' => '123456789',
                'address' => 'Ha noi',
                'gender' => 'female'
            ]
        ];
        foreach($users as $user){
            User::updateOrCreate($user);
        }
    }
}
