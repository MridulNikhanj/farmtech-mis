@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0 text-center" style="font-size: 1.5rem;">Government Schemes</h5>
        </div>
        <div class="card-body">
            <!-- Search and Filters -->
            <form id="filter-form" method="GET" action="{{ url()->current() }}">
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <input type="text" class="form-control" id="scheme-search" name="search" 
                               placeholder="Search schemes..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <select class="form-select" id="category-filter" name="category">
                            <option value="">All Categories</option>
                            <option value="Direct Benefit Transfer" {{ request('category') == 'Direct Benefit Transfer' ? 'selected' : '' }}>Direct Benefit Transfer</option>
                            <option value="Technical Support" {{ request('category') == 'Technical Support' ? 'selected' : '' }}>Technical Support</option>
                            <option value="Insurance" {{ request('category') == 'Insurance' ? 'selected' : '' }}>Insurance</option>
                            <option value="Infrastructure" {{ request('category') == 'Infrastructure' ? 'selected' : '' }}>Infrastructure</option>
                            <option value="Credit" {{ request('category') == 'Credit' ? 'selected' : '' }}>Credit</option>
                            <option value="Rural Development" {{ request('category') == 'Rural Development' ? 'selected' : '' }}>Rural Development</option>
                            <option value="Sustainable Agriculture" {{ request('category') == 'Sustainable Agriculture' ? 'selected' : '' }}>Sustainable Agriculture</option>
                            <option value="Equipment Subsidy" {{ request('category') == 'Equipment Subsidy' ? 'selected' : '' }}>Equipment Subsidy</option>
                            <option value="Input Subsidy" {{ request('category') == 'Input Subsidy' ? 'selected' : '' }}>Input Subsidy</option>
                            <option value="Social Security" {{ request('category') == 'Social Security' ? 'selected' : '' }}>Social Security</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <select class="form-select" id="state-filter" name="state">
                            <option value="">All States</option>
                            @foreach($states as $state)
                                <option value="{{ $state }}" {{ request('state') == $state ? 'selected' : '' }}>
                                    {{ $state }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </form>

            <!-- Schemes Table -->
            <div class="table-responsive">
                <table class="table table-hover custom-schemes-table">
                    <thead>
                        <tr>
                            <th style="width: 28%; text-align: center;">Scheme Name</th>
                            <th style="width: 22%; text-align: center;">Eligibility</th>
                            <th style="width: 32%; text-align: center;">Benefits</th>
                            <th style="width: 18%; text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schemes as $scheme)
                        <tr>
                            <td class="scheme-name-cell">
                                <div class="d-flex align-items-center">
                                    <span class="scheme-name bolder">{{ $scheme['name'] }}</span>
                                </div>
                                <small class="text-muted d-block">Category: {{ $scheme['category'] }}</small>
                                <small class="text-muted d-block">State: {{ $scheme['state'] }}</small>
                            </td>
                            <td>{{ $scheme['eligibility'] }}</td>
                            <td>{{ $scheme['benefits'] }}</td>
                            <td>
                                <div class="d-flex flex-column gap-2" style="min-width: 140px;">
                                    <a href="{{ $scheme['apply_link'] }}" target="_blank" class="btn btn-sm btn-apply-now">
                                        Apply Now <i class="bi bi-arrow-right"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="collapse" 
                                            data-bs-target="#details-{{ $loop->index }}">
                                        View Details
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5" class="p-0">
                                <div class="collapse" id="details-{{ $loop->index }}">
                                    <div class="card card-body border-0 bg-light">
                                        <h6 class="mb-2">Required Documents:</h6>
                                        <p class="mb-0">{{ $scheme['documents'] }}</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="no-results-message" class="text-center text-muted my-4" style="display:none; font-size:1.2rem;">No results found.</div>
            </div>
        </div>
        <!-- Pagination Controls -->
        <div class="d-flex flex-column align-items-center mt-4 mb-5">
            <div class="custom-pagination mb-2">
                {{ $schemes->links('vendor.pagination.bootstrap-5') }}
            </div>
            <div class="pagination-info text-muted small mt-1">
                Showing {{ $schemes->firstItem() }} to {{ $schemes->lastItem() }} of {{ $schemes->total() }} results
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('scheme-search');
    const categoryFilter = document.getElementById('category-filter');
    const stateFilter = document.getElementById('state-filter');
    const tableRows = document.querySelectorAll('.custom-schemes-table tbody tr');
    const noResultsMsg = document.getElementById('no-results-message');

    function filterTable() {
        const search = searchInput.value.toLowerCase();
        const category = categoryFilter.value.toLowerCase();
        const state = stateFilter.value.toLowerCase();

        let visibleRowIndex = 0;
        for (let i = 0; i < tableRows.length; i += 2) { // Each scheme is 2 rows (main + details)
            const row = tableRows[i];
            const detailsRow = tableRows[i + 1];
            const name = row.querySelector('.scheme-name')?.textContent.toLowerCase() || '';
            const cat = row.querySelector('.text-muted.d-block:nth-child(2)')?.textContent.toLowerCase() || '';
            const st = row.querySelector('.text-muted.d-block:nth-child(3)')?.textContent.toLowerCase() || '';

            const matchesSearch = name.includes(search) || cat.includes(search) || st.includes(search);
            const matchesCategory = !category || cat.includes(category);
            const matchesState = !state || st.includes(state);

            if (matchesSearch && matchesCategory && matchesState) {
                row.style.display = '';
                if (detailsRow) detailsRow.style.display = '';
                visibleRowIndex++;
            } else {
                row.style.display = 'none';
                if (detailsRow) detailsRow.style.display = 'none';
            }
        }
        if (visibleRowIndex === 0) {
            noResultsMsg.style.display = '';
        } else {
            noResultsMsg.style.display = 'none';
        }
    }

    searchInput.addEventListener('input', filterTable);
    categoryFilter.addEventListener('change', filterTable);
    stateFilter.addEventListener('change', filterTable);
});
</script>

<style>
.scheme-name {
    font-weight: 700;
    color: #26605f;
    font-size: 1.1rem;
}

.scheme-name.bolder {
    font-weight: 900;
}

.scheme-name-cell {
    vertical-align: middle;
}

.btn-primary {
    background-color: #26605f;
    border-color: #26605f;
}

.btn-primary:hover {
    background-color: #1a4544;
    border-color: #1a4544;
}

.btn-outline-secondary:hover {
    background-color: #f8f9fa;
    color: #26605f;
    border-color: #26605f;
}

.card {
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}

.form-control:focus, .form-select:focus {
    border-color: #26605f;
    box-shadow: 0 0 0 0.25rem rgba(38, 96, 95, 0.25);
}

/* Pagination Styling */
.pagination {
    margin-bottom: 0;
}

.page-link {
    color: #26605f;
    border-color: #dee2e6;
}

.page-link:hover {
    color: #1a4544;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.page-item.active .page-link {
    background-color: #26605f;
    border-color: #26605f;
}

@media (max-width: 768px) {
    .btn-sm {
        width: 100%;
    }
}

.badge.bg-info {
    background-color: #17a2b8 !important;
}

.table td {
    vertical-align: middle;
}

.custom-pagination .pagination {
    font-size: 1.25rem;
    gap: 0.25rem;
}
.custom-pagination .page-link {
    padding: 0.6rem 1.1rem;
    font-size: 1.15rem;
    border-radius: 0.5rem;
}
.custom-pagination .page-item.active .page-link {
    background-color: #26605f;
    border-color: #26605f;
    color: #fff;
}
.custom-pagination .page-link:hover {
    background-color: #e9ecef;
    color: #26605f;
}
.pagination-info {
    margin-bottom: 1.5rem;
    font-size: 1.08rem;
}

.btn-apply-now {
    background-color: #21915C;
    border-color: #21915C;
    color: #fff;
    white-space: nowrap;
}
.btn-apply-now:hover, .btn-apply-now:focus {
    background-color: #176b43;
    border-color: #176b43;
    color: #fff;
}

.custom-schemes-table th {
    text-align: center;
    vertical-align: middle;
}
.custom-schemes-table td.with-separator {
    border-left: none;
}
</style>
@endpush
@endsection 