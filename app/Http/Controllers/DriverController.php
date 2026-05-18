<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    public function index(Request $request)
{
    $query = Driver::query();

    if ($request->filled('search')) {
        $search = $request->search;

        $query->where(function ($q) use ($search) {
            $q->where('firstname', 'like', "%$search%")
              ->orWhere('lastname', 'like', "%$search%")
              ->orWhere('drivers_id', 'like', "%$search%");
        });
    }

    $drivers = $query
        ->latest()
        ->paginate(20)
        ->withQueryString(); // ⭐ IMPORTANT FIX

    return view('drivers', compact('drivers'));
}

    public function store(Request $request)
    {
        // Magdagdag ng validation
    $request->validate([
        'drivers_id' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
        'photo' => 'image|mimes:jpeg,png,jpg|max:2048'
    ]);
    
        $profileName = null;

        if($request->hasFile('photo')){
    $profileName = time().'.'.$request->photo->extension();

    $request->photo->move(public_path('uploads/drivers'), $profileName);
}

        Driver::create([
            'drivers_id' => $request->drivers_id,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'height' => $request->height,
            'weight' => $request->weight,
            'civil_status' => $request->civil_status,
            'religion' => $request->religion,
            'residence_address' => $request->residence_address,
            'provincial_address' => $request->provincial_address,
            'contact_number' => $request->contact_number,
            'drivers_license_number' => $request->drivers_license_number,
            'dl_expiration' => $request->dl_expiration,
            'emergency_person' => $request->emergency_person,
            'emergency_contact' => $request->emergency_contact,
            'photo' => $profileName,
        ]);

        return redirect()->back()->with('success', 'Driver Added Successfully');
    }

    public function update(Request $request, Driver $driver)
{
    $request->validate([
        'drivers_id' => 'required',
        'firstname' => 'required',
        'lastname' => 'required',
    ]);

    $profileName = $driver->photo;

    if ($request->hasFile('photo')) {
        $profileName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads/drivers'), $profileName);
    }

    $driver->update([
        'drivers_id' => $request->drivers_id,
        'firstname' => $request->firstname,
        'middlename' => $request->middlename,
        'lastname' => $request->lastname,
        'height' => $request->height,
        'weight' => $request->weight,
        'civil_status' => $request->civil_status,
        'religion' => $request->religion,
        'residence_address' => $request->residence_address,
        'provincial_address' => $request->provincial_address,
        'contact_number' => $request->contact_number,
        'drivers_license_number' => $request->drivers_license_number,
        'dl_expiration' => $request->dl_expiration,
        'emergency_person' => $request->emergency_person,
        'emergency_contact' => $request->emergency_contact,
        'photo' => $profileName,
    ]);

    return redirect()->back()->with('success', 'Driver Updated Successfully');
}

public function destroy(Driver $driver)
{
    $driver->delete();

    return redirect()->back()->with('success', 'Driver deleted successfully');
}
}