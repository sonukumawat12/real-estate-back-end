<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function createUser(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|unique:agents,email',
            'pincode' => 'required|string|max:10',
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'role' => 'required|string|max:100',
        ]);

        // Create the user using the validated data
        $password = Hash::make($validatedData['phone']);
        $validatedData['password'] = $password;
        unset($validatedData['role_name']);
        $agent = Agent::create($validatedData);

        $agent->assignRole($request->input('role_name'));

        return response()->json(['message' => 'User created successfully'], 201);
    }

    public function getAgents(){
        $allAgents = Agent::with('roles')->latest()->get();
        return response()->json(['success'=>true, 'data'=> compact('allAgents')]);
    }

}
