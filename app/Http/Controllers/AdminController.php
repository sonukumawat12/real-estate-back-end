<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function delete($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();

        return response()->json(['message' => 'Agent deleted successfully'], 200);
    }
}
