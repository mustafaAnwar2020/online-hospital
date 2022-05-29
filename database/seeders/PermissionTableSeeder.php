<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

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
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'hospital-list',
            'hospital-create',
            'hospital-edit',
            'hospital-delete',
            'clinic-list',
            'clinic-create',
            'clinic-edit',
            'clinic-delete',
            'patient-list',
            'patient-create',
            'patient-edit',
            'patient-delete',
            'appointment-list',
            'appointment-create',
            'appointment-edit',
            'appointment-delete',
            ];
            foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
            }
    }
}
