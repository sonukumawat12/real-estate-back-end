<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::get('roles',[RoleController::class, 'getRoles']);
Route::get('permissions',[RoleController::class, 'getPermissions']);
Route::post('create-role-with-permissions', [RoleController::class, 'createRoleWithPermissions']);
Route::post('create-user', [AdminController::class, 'createUser']);
Route::get('get-agents', [AdminController::class, 'getAgents']);
Route::delete('delete-admin/{id}', [AdminController::class, 'delete']);
