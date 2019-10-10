<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->delete();
        DB::update("ALTER TABLE user_roles AUTO_INCREMENT = 1");

        $role = new Role();
        $role->userRoleName = "Admin";
        $role->save();

        $role = new Role();
        $role->userRoleName = "Staff";
        $role->save();
    }
}
