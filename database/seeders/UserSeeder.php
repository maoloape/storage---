<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
// use illuminate\Support\Facades\DB;
use DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
     /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [[
                'name'      => 'Admin',
                'email'     => 'admin@storage.com',
                'role'      => 'admin',
                'password'  => Hash::make('123456'),
            ],
         [
                'name'      => 'User',
                'email'     => 'user@storage.com',
                'role'      => 'user',
                'password'  => Hash::make('123456'),
            ],
            
        ];

        foreach($userData as $key => $val){
            User::create($val);
        }
    }
}
