<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Agent;
class Lead extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'source',
        'type',
        'assigned_to',
        'notes',
        'password'
    ];
    
    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
}
