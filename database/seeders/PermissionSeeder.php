<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([ 'name' => 'change roles']);
        Permission::create(['name' => 'change permissions']);
        Permission::create(['name' => 'change assignPermissions']);
        Permission::create(['name' => 'change permissionToUser']);
    }
}
