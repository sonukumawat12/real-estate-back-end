<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use Illuminate\Support\Facades\Hash;


class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::with(['agents:id,first_name,last_name'])->latest()->get();

        return response()->json([
            'status'  => true,
            'message' => 'Leads fetched successfully',
            'data'    => $leads
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:leads,email',
            'phone' => 'required|string|max:14',
            'assigned_to' => 'required',
            'source' => 'required',
            'type' => 'required',
        ]);
    
        $data = $request->all();
        $data['password'] = Hash::make($data['phone']);
    
        // Lead insert
        $lead = Lead::create($data);
    
        // Assign primary agent to pivot table as well
        $lead->agents()->attach($data['assigned_to']);
    
        return response()->json([
            'status'  => true,
            'message' => 'Lead created successfully',
            'data'    => $lead->load('agents') // include agents in response
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
