<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->delete();
        DB::update("ALTER TABLE users AUTO_INCREMENT = 1");

        $user = new User();
        $user->name = "Ambrosius";
        $user->username = "ambro";
        $user->password = Hash::make("ambro");
        $user->save();

        $user = new User();
        $user->name = "David";
        $user->username = "david";
        $user->password = Hash::make("david");
        $user->save();

    }
}
