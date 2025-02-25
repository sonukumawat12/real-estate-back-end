<?php

namespace App\Http\Controllers\RolePermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function getRoles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }
    public function getPermissions()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }
public function createRoleWithPermissions(Request $request)
{
    try {
        $request->validate([
            'roleName' => 'required|string|unique:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::create(['name' => $request->roleName, 'guard_name' => 'api']);

        if ($request->permissions) {
            $role->givePermissionTo($request->permissions);
        }

        return response()->json(['message' => 'Role created successfully', 'role' => $role], 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'message' => 'error',
            'errors' => $e->validator->errors(),
        ], 422);
    }
}
}
