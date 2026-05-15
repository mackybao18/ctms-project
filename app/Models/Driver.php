<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
    'driver_id',
    'first_name',
    'middle_name',
    'last_name',
    'height',
    'weight',
    'civil_status',
    'religion',
    'residence_address',
    'provincial_address',
    'toda',
    'contact_number',
    'license_number',
    'expiration_date',
    'emergency_person',
    'emergency_contact',
    'profile',
    'status',
];
}
