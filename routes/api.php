<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::get('roles',[RoleController::class, 'getRoles']);
Route::get('permissions',[RoleController::class, 'getPermissions']);
Route::post('create-role-with-permissions', [RoleController::class, 'createRoleWithPermissions']);
Route::post('create-user', [AgentController::class, 'createUser']);
Route::get('get-agents', [AgentController::class, 'getAgents']);
