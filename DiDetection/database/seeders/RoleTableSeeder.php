<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_doctor=new Role();
        $role_doctor->name='Doctor';
        $role_doctor->description='A Doctor';
        $role_doctor->save();

        $role_admin=new Role();
        $role_admin->name='Admin';
        $role_admin->description='An Admin';
        $role_admin->save();
    }
}
