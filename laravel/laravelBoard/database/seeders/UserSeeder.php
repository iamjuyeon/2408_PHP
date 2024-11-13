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
        $user = new User();
        $user->u_email = 'admin@admin.com';
        $user->u_password = Hash::make('asdf1234');
        $user->u_name = '관리자';
        $user->save();

        User::factory(30)->create();

        // User::insert([
        //     [
        //         'u_email'=> 'admin@admin.com'
        //         ,'u_password'=> Hash::make('asdf1234')
        //         ,'u_name'=> '관리자'
        //     ]
        //     ]);
    }
}
