<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'department-list',
            'department-create',
            'department-edit',
            'department-delete',
            'annualworkplan-list',
            'annualworkplan-create',
            'annualworkplan-edit',
            'annualworkplan-delete',
            'division-list',
            'division-create',
            'division-edit',
            'division-delete',
            'mainactivity-list',
            'mainactivity-create',
            'mainactivity-edit',
            'mainactivity-delete',
            'ministry-list',
            'ministry-create',
            'ministry-edit',
            'ministry-delete',
            'resultarea-list',
            'resultarea-create',
            'resultarea-edit',
            'resultarea-delete',
            'rollingplan-list',
            'rollingplan-create',
            'rollingplan-edit',
            'rollingplan-delete',
            'sourceoffunding-list',
            'sourceoffunding-create',
            'sourceoffunding-edit',
            'sourceoffunding-delete',
            'task-list',
            'task-create',
            'task-edit',
            'task-delete',
            'taskreporting-list',
            'taskreporting-create',
            'taskreporting-edit',
            'taskreporting-delete',
            'unit-list',
            'unit-create',
            'unit-edit',
            'unit-delete'
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
