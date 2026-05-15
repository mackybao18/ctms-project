@extends('layouts.main')

@section('title', 'Drivers')

@section('content')
<div class="drivers-page">
    {{-- HEADER --}}
    <div class="drivers-header">
        <div>
            <h2>DRIVERS</h2>
            <p>Manage all registered drivers</p>
        </div>

        <button class="btn-add" data-bs-toggle="modal" data-bs-target="#addDriverModal">
            <i class="fa fa-plus"></i>
            Add Driver
        </button>
    </div>

    {{-- TOOLBAR --}}
    <div class="drivers-toolbar">
        <div class="search-box">
            <i class="fa fa-search"></i>
            <input type="text" placeholder="Search driver...">
        </div>
    </div>

    {{-- TABLE --}}
   {{-- TABLE --}}
<div class="table-container">
    <table class="drivers-table">
        <thead>
            <tr>
                <th>Driver ID</th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>TODA</th>
                <th>Contact</th>
                <th>License No.</th>
                <th>Expiration</th>
                <th>Address</th>
                <th>Emergency Contact</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>

@foreach($drivers as $driver)

<tr>

    <td>{{ $driver->driver_id }}</td>

    <td>
        <img src="{{ asset('uploads/drivers/'.$driver->profile) }}"
             class="table-profile">
    </td>

    <td>
        {{ $driver->first_name }}
        {{ $driver->middle_name }}
        {{ $driver->last_name }}
    </td>

    <td>{{ $driver->toda }}</td>

    <td>{{ $driver->contact_number }}</td>

    <td>{{ $driver->license_number }}</td>

    <td>{{ $driver->expiration_date }}</td>

    <td>{{ $driver->residence_address }}</td>

    <td>
        {{ $driver->emergency_person }}<br>
        {{ $driver->emergency_contact }}
    </td>

    <td>
        <span class="status active">
            {{ $driver->status }}
        </span>
    </td>

    <td>
        <div class="action-buttons">
            <button class="btn-edit">
                <i class="fa fa-edit"></i>
            </button>

            <button class="btn-delete">
                <i class="fa fa-trash"></i>
            </button>
        </div>
    </td>

</tr>

@endforeach

</tbody>
    </table>
</div>

</div>

{{-- MODAL --}}
<div class="modal fade" id="addDriverModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal">

            {{-- HEADER --}}
            <div class="modal-header custom-header">
                <div>
                    <h4>Add Driver</h4>
                    <p>Register new driver information</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="modal-body">

                    <div class="row g-4">

                        {{-- PROFILE --}}
                        <div class="col-lg-3">
                            <div class="upload-card">
                                <div class="profile-preview">
                                    <i class="fa fa-user"></i>
                                </div>
                                <label class="upload-btn">
                                    Upload Profile
                                    <input type="file" name="profile" hidden>
                                </label>
                            </div>
                        </div>

                        {{-- FORM --}}
                        <div class="col-lg-9">
                            <div class="row g-4">

                                <div class="col-12">
                                    <div class="floating-group">
                                        <input type="text" name="driver_id" required>
                                        <label>Driver ID</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="floating-group">
                                        <input type="text" name="first_name" required>
                                        <label>First Name</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="floating-group">
                                        <input type="text" name="middle_name">
                                        <label>Middle Name</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="floating-group">
                                        <input type="text" name="last_name" required>
                                        <label>Last Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="height">
                                        <label>Height</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="weight">
                                        <label>Weight</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <select name="civil_status" required>
                                            <option value="civil_status"></option>
                                            <option>Single</option>
                                            <option>Married</option>
                                        </select>
                                        <label>Civil Status</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="religion" required>
                                        <label>Religion</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="residence_address" required>
                                        <label>Residence Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="provincial_address" required>
                                        <label>Provincial Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <select name="toda" required>
                                            <option value="toda"></option>
                                            <option>Central TODA</option>
                                            <option>North TODA</option>
                                        </select>
                                        <label>TODA</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="contact_number">
                                        <label>Contact Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="license_number">
                                        <label>License Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="date" name="expiration_date">
                                        <label>Expiration Date</label>
                                    </div>
                                </div>

                                {{-- EMERGENCY --}}
                                <div class="col-12 mt-3">
                                    <h5 class="section-title">Emergency Contact</h5>
                                    <p class="section-sub">In case of emergency details</p>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="emergency_person" required>
                                        <label>Contact Person</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="emergency_contact" required>
                                        <label>Contact No.</label>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="modal-footer custom-footer">
                    <button type="button" class="btn-cancel" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-save">
                        <i class="fa fa-save"></i> Save Driver
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection