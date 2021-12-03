<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'username'  => 'required|unique:users,username,'.auth()->user()->id,
            'email'     => 'required|email|unique:users,email,'.auth()->user()->id,
        ]);
        return auth()->user()->update($data);
    }
    public function picture(Request $request)
    {
        if (auth()->user()->picture) {
            Storage::delete(auth()->user()->picture);
        }
        $picture = $request->file('picture')->store('images/picture');
        
        return auth()->user()->update([
            'picture' => $picture
        ]);
    }
    public function assignUser(Request $request)
    {
         $request->validate([
              'email' => 'required',
              'roles' => 'array'
         ]);
         $user = User::where('email', $request->email)->first();
         return $user->syncRoles($request->roles);
    }
    public function getUsers()
    {
         return User::has('roles')->with('roles')->get();
    }
    public function getUser(User $user)
    {
         return $user;
    }
    public function create(Request $request)
    {
         $request->validate([
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'username' => ['required', 'string', 'min:4', 'max:20', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
         ]);
         return User::create([
              'name' => $request->name,
              'email' => $request->email,
              'username' => $request->username,
              'password' => bcrypt($request->password)
         ]);
    }
    public function show()
    {
         return User::with('roles')->where('id', '!=', 1)->get();
    }
    public function storeEditUser(Request $request)
    {
          $data = $request->validate([
               'name'      => 'required',
               'username'  => 'required|unique:users,username,'.request()->id,
               'email'     => 'required|email|unique:users,email,'.request()->id,
          ]);
         $user = User::find(request()->id);
         return $user->update($data);
    }
    public function storeEditUserPassword(Request $request)
    {
          $request->validate([
               'password' => ['required', 'string', 'min:8', 'confirmed'],
          ]);
         $user = User::find(request()->id);
         return $user->update([
              'password' => bcrypt($request->password)
         ]);
    }
    public function delete(Request $request)
    {
         $user = User::find($request->id);
         return $user->delete();
    }
}
