<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'email' => 'joash_gomba@yahoo.com',
            'name' => 'Joash Gomba',
            'password' => bcrypt('password123')
        ]);

        $role = Role::create(['name' => 'Super Admin']);
        $permission = Permission::get();
        $permissions = array();

        foreach($permission as $value):
            $permissions[] = $value;
        endforeach;

        $role->syncPermissions($permissions);

        $user->assignRole($role);


    }
}
