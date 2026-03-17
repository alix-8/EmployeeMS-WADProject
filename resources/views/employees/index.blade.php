<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row mb-4 align-items-center">
            <div class="col">
                <h1 class="display-5 fw-bold text-primary">Employee Records</h1>
                <p class="text-muted">Manage and track your company's workforce.</p>
            </div>
            <div class="col text-end">
                <a href="{{ route('employees.create') }}" class="btn btn-primary shadow-sm px-4">
                    Add New Employee
                </a>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body p-4">
                <form action="{{ route('employees.index') }}" method="GET" class="row g-3">
                    <div class="col-md-5">
                        <label class="form-label fw-bold small text-uppercase">Search Employee</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                            <input type="text" name="search" class="form-control border-start-0" placeholder="Search by name or ID..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bold small text-uppercase">Filter by Department</label>
                        <select name="department_filter" class="form-select">
                            <option value="">All Departments</option>
                            @foreach(['IT', 'HR', 'Finance', 'Marketing', 'Operations'] as $dept)
                                <option value="{{ $dept }}" {{ request('department_filter') == $dept ? 'selected' : '' }}>
                                    {{ $dept }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <div class="btn-group w-100 shadow-sm">
                            <button type="submit" class="btn btn-dark">Apply Filter</button>
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="ps-4 py-3">Employee ID</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Date Hired</th>
                                <th class="text-center pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($employees as $employee)
                                <tr>
                                    <td class="ps-4 fw-bold text-primary">
                                        {{ $employee->employee_id }}
                                    </td>
                                    <td>
                                        <div class="fw-bold">{{ $employee->name }}</div>
                                        <small class="text-muted">{{ $employee->email }}</small>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border px-3 py-2 rounded-pill">
                                            {{ $employee->department }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($employee->date_hired)->format('M d, Y') }}
                                    </td>
                                    <td class="text-center pe-4">
                                        <div class="btn-group">
                                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-info text-white">View</a>
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning" title="Edit Employee">
                                                Edit
                                            </a>
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this employee record?')" title="Delete Employee">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <p class="h5">No employee records found.</p>
                                        <small>Check your filters or add a new employee.</small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-center p-4 border-top">
                    {{ $employees->appends(request()->query())->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>