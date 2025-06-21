<?php

namespace App\Models;
use App\Models\Lead;

use Illuminate\Database\Eloquent\Model;


class Agent extends Model
{
    protected $appends = ['full_name'];
    
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function leads()
    {
        return $this->belongsToMany(Lead::class);
    }
}
