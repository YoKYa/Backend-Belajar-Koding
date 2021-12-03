<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
     public function index()
     {
          return Permission::get();
     }
     public function create()
     {
          request()->validate([
               'name' => 'required'
          ]);
          return Permission::create([
               'name' => request('name'),
               'guard_name' => request('guard_name') ?? 'web'
          ]);
     }
     public function edit()
     {
          return Permission::find(request('id'));
     }
     public function update()
     {
          $permission = Permission::find(request('id'));
          return $permission->update([
               'name' => request('name'),
               'guard_name' => request('guard_name') ?? 'web'
          ]);
     }
     public function delete()
     {
          $permission = Permission::find(request('id'));
          return $permission->delete();
     }
}
