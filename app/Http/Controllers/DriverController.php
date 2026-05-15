<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index()
    {
        $drivers = Driver::latest()->get();

        return view('drivers', compact('drivers'));
    }

    public function store(Request $request)
    {
        // Magdagdag ng validation
    $request->validate([
        'driver_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'profile' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);
    
        $profileName = null;

        if($request->hasFile('profile')){
            $profileName = time().'.'.$request->profile->extension();

            $request->profile->move(public_path('uploads/drivers'), $profileName);
        }

        Driver::create([
            'driver_id' => $request->driver_id,
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'height' => $request->height,
            'weight' => $request->weight,
            'civil_status' => $request->civil_status,
            'religion' => $request->religion,
            'residence_address' => $request->residence_address,
            'provincial_address' => $request->provincial_address,
            'toda' => $request->toda,
            'contact_number' => $request->contact_number,
            'license_number' => $request->license_number,
            'expiration_date' => $request->expiration_date,
            'emergency_person' => $request->emergency_person,
            'emergency_contact' => $request->emergency_contact,
            'profile' => $profileName,
        ]);

        return redirect()->back()->with('success', 'Driver Added Successfully');
    }
}