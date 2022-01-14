<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Spatie\Permission\Models\Permission;
// use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role_doctor=Role::where('name','Doctor')->first();
        $role_admin=Role::where('name','Admin')->first();


        $doctor= new User();
        $doctor->name='Joel Odhiambo';
        $doctor->email='jodhiambo@strathmore.com';
        $doctor->password=bcrypt('doctor');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);

        $admin= new User();
        $admin->name='Joel Admin';
        $admin->email='jwesley@strathmore.com';
        $admin->password=bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $doctor= new User();
        $doctor->name='Wesley Odhiambo';
        $doctor->email='wodhi@strathmore.com';
        $doctor->password=bcrypt('doctor');
        $doctor->save();
        $doctor->roles()->attach($role_doctor);
        
        $admin= new User();
        $admin->name='Wesley Admin';
        $admin->email='adminwesley@strathmore.com';
        $admin->password=bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

    }
}
