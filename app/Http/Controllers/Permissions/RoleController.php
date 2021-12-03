<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
         return Role::with('permissions')->get();
    }
    public function create()
    {
         request()->validate([
              'name' => 'required'
         ]);
         return Role::create([
              'name' => request('name'),
              'guard_name' => request('guard_name') ?? 'web'
         ]);
    }
    public function edit()
    {
         return Role::find(request('id'));
    }
    public function update()
    {
         $role = Role::find(request('id'));
         return $role->update([
               'name' => request('name'),
               'guard_name' => request('guard_name') ?? 'web'
         ]);
    }
    public function delete()
    {
         $role = Role::find(request('id'));
         return $role->delete();
    }
}
