@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">Edit Beneficiary Details</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('farmer.update', $farmer->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <!-- Photo Upload -->
                    <div class="col-12">
                        <label class="form-label">Beneficiary Photo</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('farmer_photo') is-invalid @enderror" 
                                name="farmer_photo" accept="image/*">
                            <small class="d-block text-muted mt-1">Upload file upto 2MB and only jpg, jpeg, png, gif file extensions are allowed</small>
                            @if($farmer->farmer_photo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $farmer->farmer_photo) }}" alt="Current Photo" class="img-thumbnail" style="max-width: 150px;">
                                </div>
                            @endif
                            @error('farmer_photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Associated FPO/SHG -->
                    <div class="col-md-6">
                        <label class="form-label">Associated FPO/SHG</label>
                        <input type="text" class="form-control @error('associated_fpo') is-invalid @enderror" name="associated_fpo" value="{{ old('associated_fpo', $farmer->associated_fpo) }}">
                        @error('associated_fpo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- FPO/SHG Registration ID -->
                    <div class="col-md-6">
                        <label class="form-label">FPO/SHG Registration ID*</label>
                        <input type="text" class="form-control @error('fpo_registration_no') is-invalid @enderror" name="fpo_registration_no" value="{{ old('fpo_registration_no', $farmer->fpo_registration_no) }}" required>
                        @error('fpo_registration_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Basic Details -->
                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="category">
                            <option value="">Select</option>
                            <option value="General" {{ old('category', $farmer->category) == 'General' ? 'selected' : '' }}>General</option>
                            <option value="OBC" {{ old('category', $farmer->category) == 'OBC' ? 'selected' : '' }}>OBC</option>
                            <option value="SC" {{ old('category', $farmer->category) == 'SC' ? 'selected' : '' }}>SC</option>
                            <option value="ST" {{ old('category', $farmer->category) == 'ST' ? 'selected' : '' }}>ST</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Beneficiary Name*</label>
                        <input type="text" class="form-control @error('farmer_name') is-invalid @enderror" 
                            name="farmer_name" value="{{ old('farmer_name', $farmer->farmer_name) }}" required>
                        @error('farmer_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Father's Name/Husband Name*</label>
                        <input type="text" class="form-control @error('father_name') is-invalid @enderror" 
                            name="father_name" value="{{ old('father_name', $farmer->father_name) }}" required>
                        @error('father_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Gender*</label>
                        <select class="form-select @error('gender') is-invalid @enderror" name="gender" required>
                            <option value="">Select</option>
                            <option value="Male" {{ old('gender', $farmer->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $farmer->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender', $farmer->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Date of Birth*</label>
                        <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" 
                            name="date_of_birth" value="{{ old('date_of_birth', $farmer->date_of_birth) }}" required>
                        @error('date_of_birth')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Address Details -->
                    <div class="col-12">
                        <label class="form-label">Address*</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" 
                            name="address" rows="2" required>{{ old('address', $farmer->address) }}</textarea>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Pin Code*</label>
                        <input type="text" class="form-control @error('pin_code') is-invalid @enderror" 
                            name="pin_code" value="{{ old('pin_code', $farmer->pin_code) }}" required>
                        @error('pin_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">State*</label>
                        <input type="text" class="form-control @error('state') is-invalid @enderror" 
                            name="state" value="{{ old('state', $farmer->state) }}" required>
                        @error('state')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">District*</label>
                        <input type="text" class="form-control @error('district') is-invalid @enderror" 
                            name="district" value="{{ old('district', $farmer->district) }}" required>
                        @error('district')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Block*</label>
                        <input type="text" class="form-control @error('block') is-invalid @enderror" 
                            name="block" value="{{ old('block', $farmer->block) }}" required>
                        @error('block')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Other Details -->
                    <div class="col-md-6">
                        <label class="form-label">Aadhar No.*</label>
                        <input type="text" class="form-control @error('aadhar_no') is-invalid @enderror" 
                            name="aadhar_no" value="{{ old('aadhar_no', $farmer->aadhar_no) }}" required>
                        @error('aadhar_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mobile Number -->
                    <div class="col-md-6">
                        <label class="form-label">Mobile Number*</label>
                        <input type="text" class="form-control @error('mobile_no') is-invalid @enderror" 
                            name="mobile_no" value="{{ old('mobile_no', $farmer->mobile_no) }}" required>
                        @error('mobile_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="col-md-6">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                            name="email" value="{{ old('email', $farmer->email) }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Land Owner*</label>
                        <select class="form-select @error('area_type') is-invalid @enderror" name="area_type" required>
                            <option value="">Select</option>
                            <option value="Yes" {{ old('area_type', $farmer->area_type) == 'Yes' ? 'selected' : '' }}>Yes</option>
                            <option value="No" {{ old('area_type', $farmer->area_type) == 'No' ? 'selected' : '' }}>No</option>
                        </select>
                        @error('area_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Status*</label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" required>
                            <option value="Active" {{ old('status', $farmer->status) == 'Active' ? 'selected' : '' }}>Active</option>
                            <option value="Inactive" {{ old('status', $farmer->status) == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                        <a href="{{ route('farmer.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </form>
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

.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border-radius: 5px;
    padding: 0.5rem 0.75rem;
}

.btn {
    padding: 0.5rem 1.5rem;
    border-radius: 5px;
}

.btn-primary {
    background-color: #26605f;
    border-color: #26605f;
}

.btn-primary:hover {
    background-color: #3a7d7b;
    border-color: #3a7d7b;
}
</style>
@endsection 