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
<br>
   {{-- TOOLBAR --}}
<div class="drivers-toolbar">

    <div class="table-info">
        <h4>Drivers List</h4>
        <span>{{ $drivers->count() }} Registered Drivers</span>
    </div>

    <div class="search-box">
        <i class="fa fa-search"></i>
        <form method="GET" action="{{ route('drivers.index') }}" class="search-box">
            <i class="fa fa-search"></i>
            <input 
                type="text" 
                name="search"
                value="{{ request('search') }}"
                placeholder="Search driver..."
            >
        </form>
    </div>

</div>

{{-- TABLE --}}
<div class="table-wrapper">

    <div class="table-container">

        <table class="drivers-table" id="driversTable">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Profile</th>
                    <th>Driver Name</th>
                    <th>Contact</th>
                    <th>License</th>
                    <th>Expiration</th>
                    <th>Address</th>
                    <th>Emergency</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>

            @foreach($drivers as $driver)

            <tr>

                <td>
                    <span class="driver-id">
                        #{{ $driver->drivers_id }}
                    </span>
                </td>

                <td>
                    <img src="{{ asset('uploads/drivers/'.$driver->profile) }}"
                        class="table-profile">
                </td>

                <td>
                    <div class="driver-name">
                        <strong>
                            {{ $driver->firstname }}
                            {{ $driver->lastname }}
                        </strong>

                        <small>
                            {{ $driver->middlename }}
                        </small>
                    </div>
                </td>

                <td>{{ $driver->contact_number }}</td>

                <td>{{ $driver->drivers_license_number }}</td>

                <td>
                    {{ \Carbon\Carbon::parse($driver->dl_expiration)->format('M d, Y') }}
                </td>

                <td class="address-cell">
                    {{ $driver->residence_address }}
                </td>

                <td>
                    <div class="emergency-box">
                        <strong>{{ $driver->emergency_person }}</strong>
                        <small>{{ $driver->emergency_contact }}</small>
                    </div>
                </td>

                <td>
                    <span class="status-badge active">
                        {{ $driver->status }}
                    </span>
                </td>

                <td>

                    <div class="action-buttons">

                        <button class="btn-action edit"
                            onclick="openEditModal({{ $driver }})"
                            data-bs-toggle="modal"
                            data-bs-target="#editDriverModal">
                            <i class="fa fa-pen"></i>
                        </button>

                        <button class="btn-action delete">
                            <i class="fa fa-trash"></i>
                        </button>

                    </div>

                </td>

            </tr>

            @endforeach

            </tbody>

        </table>

    </div>

    {{-- PAGINATION --}}
    <di<div class="pagination-wrapper">
    {{ $drivers->appends(request()->query())->links('pagination::bootstrap-5') }}
</div>

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
                            <label class="upload-card">

    <div class="profile-preview">
        <i class="fa fa-user"></i>
    </div>

    <span class="upload-btn">
        Upload Profile
    </span>

    <input type="file" name="photo" hidden>

</label>
                        </div>

                        {{-- FORM --}}
                        <div class="col-lg-9">
                            <div class="row g-4">

                                <div class="col-12">
                                    <div class="floating-group">
                                        <input type="text" name="drivers_id" placeholder=" " required>
                                        <label>Driver ID</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="floating-group">
                                        <input type="text" name="firstname" placeholder=" " required>
                                        <label>First Name</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="floating-group">
                                        <input type="text" name="middlename" placeholder=" " required>
                                        <label>Middle Name</label>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="floating-group">
                                        <input type="text" name="lastname" placeholder=" " required>
                                        <label>Last Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="height" placeholder=" " required>
                                        <label>Height</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="weight" placeholder=" " required>
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
                                        <input type="text" name="religion" placeholder=" " required>
                                        <label>Religion</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="residence_address" placeholder=" " required>
                                        <label>Residence Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="provincial_address" placeholder=" " required>
                                        <label>Provincial Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="contact_number" placeholder=" " required>
                                        <label>Contact Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="drivers_license_number" placeholder=" " required>
                                        <label>License Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="date" name="dl_expiration" placeholder=" " required>
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
                                        <input type="text" name="emergency_person" placeholder=" " required>
                                        <label>Contact Person</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="floating-group">
                                        <input type="text" name="emergency_contact" placeholder=" " required>
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

<div class="modal fade" id="editDriverModal" tabindex="-1">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">

            <form method="POST" id="editDriverForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="modal-header">
                    <h4>Edit Driver</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" id="edit_driver_id">

                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" name="firstname" id="edit_firstname" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <input type="text" name="lastname" id="edit_lastname" class="form-control">
                        </div>
                    </div>

                    {{-- add more fields same pattern --}}

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function openEditModal(driver) {

    let form = document.getElementById('editDriverForm');

    form.action = `/drivers/${driver.id}`;

    document.getElementById('edit_firstname').value = driver.firstname;
    document.getElementById('edit_lastname').value = driver.lastname;

    document.getElementById('edit_driver_id').value = driver.id;
}
</script>
@endpush