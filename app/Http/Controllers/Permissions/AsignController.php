<?php

namespace App\Http\Controllers\Permissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AsignController extends Controller
{
    public function store()
    {
         request()->validate([
              'role' => 'required',
              'permissions' => 'array',
         ]);
         $role = Role::where('name',request('role'))->first();
         return $role->syncPermissions(request('permissions'));
    }
    public function sync(Request $request)
    {
         $role = Role::where('name', $request->role)->first();
         return $role->permissions->pluck('name');
    }
}
