<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function createUser(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:admins,email',
            'pincode' => 'required|string|max:10',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'role' => 'required|string|max:100',
        ]);

        // Create the user using the validated data
        $password = Hash::make($validatedData['phone']);
        $validatedData['password'] = $password;
        $agent = Admin::create($validatedData);

        if ($request->has('role')) {
            try {
                $agent->assignRole($request->input('role'));
            } catch (\Throwable $th) {
                return response()->json(['message' => 'Role assignment failed'], 500);
            }
        }
        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function getAgents(){
        $allAgents = Admin::with('roles')->latest()->get();
        return response()->json(['success'=>true, 'data'=> compact('allAgents')]);
    }
    public function delete($id)
    {
        $agent = Admin::findOrFail($id);
        $agent->delete();

        return response()->json(['message' => 'Agent deleted successfully'], 200);
    }
}
