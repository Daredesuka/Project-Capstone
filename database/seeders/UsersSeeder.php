<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UsersSeeder::class);
        $init = new User;
        $init->officer_name = "Admin";
        $init->username = "admin123";
        $init->email = "admin123@gmail.com";
        $init->phone_number = "087756432188";
        $init->photo = "12";
        $init->password = Hash::make("admin123456");
        $init->level_id = '1';
        $init->save();

        $init = new User;
        $init->officer_name = "officer";
        $init->username = "Officer";
        $init->email = "officer@gmail.com";
        $init->phone_number = "088228740010";
        $init->photo = "21";
        $init->password = Hash::make("123456");
        $init->level_id = '2';
        $init->save();
    }
}