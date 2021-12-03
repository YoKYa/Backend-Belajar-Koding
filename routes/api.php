<?php

use App\Http\Controllers\Auth\MeController;
use Illuminate\Support\Facades\{Auth, Route};
use App\Http\Controllers\Permissions\AsignController;
use App\Http\Controllers\{ProgrammingLanguageController, UserController, QuotesController};
use App\Http\Controllers\Permissions\{RoleController, PermissionController};

// Auth::loginUsingId(1);
Route::get('quotes', [QuotesController::class, 'getQuotes']);
Route::middleware('auth:sanctum')->group(function () {
     Route::get('me', MeController::class);
     Route::post('profile/edit', [UserController::class, 'store']);
     Route::post('profile/picture', [UserController::class, 'picture']);
     
     Route::group(['prefix' => 'quotes', 'middleware' =>  ['permission:change quotes']],function () {
          Route::post('create', [QuotesController::class, 'create']);
          Route::post('store', [QuotesController::class, 'store']);
          Route::post('delete', [QuotesController::class, 'delete']);
     });

     Route::group(['prefix' => 'programminglanguage', 'middleware' =>  ['permission:change programmingLanguage']],function () {
          Route::get('/', [ProgrammingLanguageController::class, 'index']);
          Route::post('create', [ProgrammingLanguageController::class, 'create']);
          Route::post('store', [ProgrammingLanguageController::class, 'store']);
          Route::post('delete', [ProgrammingLanguageController::class, 'delete']);
     });
     
     Route::group(['prefix' => 'user'],function () {
          Route::get('/', [UserController::class, 'show'])->middleware('permission:show user');    
          Route::post('create', [UserController::class, 'create'])->middleware('permission:create user');    
          Route::get('edit/{user:username}', [UserController::class, 'getUser'])->middleware('permission:edit user');    
          Route::post('store', [UserController::class, 'storeEditUser'])->middleware('permission:edit user');
          Route::post('storepassword', [UserController::class, 'storeEditUserPassword'])->middleware('permission:edit user');
          Route::post('delete', [UserController::class, 'delete'])->middleware('permission:delete user');        
     });

     Route::group(['prefix' => 'roles', 'middleware' => ['permission:change roles']],function () {
          Route::get('/', [RoleController::class, 'index']);
          Route::post('create', [RoleController::class, 'create']);
          Route::post('edit', [RoleController::class, 'edit']);
          Route::post('update', [RoleController::class, 'update']);
          Route::post('delete', [RoleController::class, 'delete']);
     });
     Route::group(['prefix' => 'permissions', 'middleware' => ['permission:change permissions']],function () {
          Route::get('/', [PermissionController::class, 'index']);
          Route::post('create', [PermissionController::class, 'create']);
          Route::post('edit', [PermissionController::class, 'edit']);
          Route::post('update', [PermissionController::class, 'update']);
          Route::post('delete', [PermissionController::class, 'delete']);
     });
     Route::group(['prefix' => 'assign', 'middleware' => ['permission:change assignPermissions']],function () {
          Route::post('store', [AsignController::class, 'store']);
          Route::post('sync', [AsignController::class, 'sync']);
     });
     Route::group(['prefix' => 'assignuser', 'middleware' => ['permission:change permissionToUser']],    function () {
          Route::post('store', [UserController::class, 'assignUser']);
          Route::get('users', [UserController::class, 'getUsers']);
     });
});
