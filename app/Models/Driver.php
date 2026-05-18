<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
   protected $fillable = [
    'drivers_id',
    'firstname',
    'middlename',
    'lastname',
    'height',
    'weight',
    'civil_status',
    'religion',
    'residence_address',
    'provincial_address',
    'contact_number',
    'drivers_license_number',
    'dl_expiration',
    'emergency_person',
    'emergency_contact',
    'photo',
];
}
