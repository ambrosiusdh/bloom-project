<?php

use App\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->delete();
        DB::update("ALTER TABLE user_roles AUTO_INCREMENT = 1");

        $userRole = new UserRole();
        $userRole->userId = 1;
        $userRole->roleId = 1;
        $userRole->save();

        $userRole = new UserRole();
        $userRole->userId = 2;
        $userRole->roleId = 2;
        $userRole->save();

    }
}
