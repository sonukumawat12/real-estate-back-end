<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Model
{
    use HasFactory , HasRoles   ;
    protected $guard_name = 'api';
    protected $fillable = [
        'firstName',
        'lastName',
        'phone',
        'email',
        'pincode',
        'country',
        'state',
        'city',
        'password',
    ];
}
