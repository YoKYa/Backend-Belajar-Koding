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
        Permission::create(['name' => 'change programmingLanguage']);
        Permission::create(['name' => 'change quotes']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'change materi']);
    }
}
