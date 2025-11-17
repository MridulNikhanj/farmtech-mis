@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Beneficiary Details</h5>
                <a href="{{ route('farmer.create') }}" class="btn btn-success">
                    <i class="bi bi-plus-lg"></i> Add
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Beneficiary Name</th>
                            <th>Aadhar No.</th>
                            <th>Associated FPO/SHG</th>
                            <th>FPO/SHG Registration ID</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($farmers as $key => $farmer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $farmer->farmer_name }}</td>
                            <td>{{ $farmer->aadhar_no }}</td>
                            <td>{{ $farmer->fpo_registration_no }}</td>
                            <td>{{ $farmer->fpo_registration_no }}</td>
                            <td>
                                <span class="badge {{ $farmer->status === 'Active' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $farmer->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('farmer.edit', $farmer->id) }}" class="btn btn-sm text-white" style="background-color: #DAA520;">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <a href="{{ route('farmer.show', $farmer->id) }}" class="btn btn-sm btn-primary">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <form action="{{ route('farmer.destroy', $farmer->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No farmers registered yet.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 