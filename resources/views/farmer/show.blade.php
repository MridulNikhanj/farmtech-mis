@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Beneficiary Details</h5>
                <a href="{{ route('farmer.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                @if($farmer->farmer_photo)
                <div class="col-md-3 mb-4">
                    <img src="{{ asset('storage/' . $farmer->farmer_photo) }}" alt="Beneficiary Photo" class="img-fluid rounded">
                </div>
                @endif
                <div class="col-md-9">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Associated FPO/SHG</th>
                                <td>{{ $farmer->associated_fpo }}</td>
                            </tr>
                            <tr>
                                <th>FPO/SHG Registration ID</th>
                                <td>{{ $farmer->fpo_registration_no }}</td>
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>{{ $farmer->category }}</td>
                            </tr>
                            <tr>
                                <th>Beneficiary Name</th>
                                <td>{{ $farmer->farmer_name }}</td>
                            </tr>
                            <tr>
                                <th>Father's/Husband's Name</th>
                                <td>{{ $farmer->father_name }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $farmer->gender }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{ $farmer->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $farmer->address }}</td>
                            </tr>
                            <tr>
                                <th>Pin Code</th>
                                <td>{{ $farmer->pin_code }}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{ $farmer->mobile_no }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $farmer->email }}</td>
                            </tr>
                            <tr>
                                <th>State</th>
                                <td>{{ $farmer->state }}</td>
                            </tr>
                            <tr>
                                <th>Aadhar No.</th>
                                <td>{{ $farmer->aadhar_no }}</td>
                            </tr>
                            <tr>
                                <th>District</th>
                                <td>{{ $farmer->district }}</td>
                            </tr>
                            <tr>
                                <th>Block</th>
                                <td>{{ $farmer->block }}</td>
                            </tr>
                            <tr>
                                <th>Land Owner</th>
                                <td>{{ $farmer->area_type }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span class="badge {{ $farmer->status === 'Active' ? 'bg-success' : 'bg-danger' }}">
                                        {{ $farmer->status }}
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.card-header {
    border-bottom: 1px solid #eee;
}

.table th {
    background-color: #f8f9fa;
}
</style>
@endsection 