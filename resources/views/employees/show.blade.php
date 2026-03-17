<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details - {{ $employee->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-info text-white py-3 d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 h5">Employee Profile Details</h3>
                    </div>
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="display-4 text-info mb-2">
                                <i class="bi bi-person-circle"></i>
                            </div>
                            <h4 class="mt-2 fw-bold text-dark">{{ $employee->name }}</h4>
                            <p class="text-muted small">Employee ID: {{ $employee->employee_id }}</p>
                        </div>

                        <table class="table table-striped table-hover border">
                            <tr>
                                <th class="bg-light w-25">Full Name</th>
                                <td class="fw-bold">{{ $employee->name }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Email Address</th>
                                <td class="text-primary">{{ $employee->email }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Department</th>
                                <td>
                                    <span class="badge bg-info text-white px-3 py-2 rounded-pill">
                                        {{ $employee->department }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Date Hired</th>
                                <td class="fw-bold">
                                    {{ \Carbon\Carbon::parse($employee->date_hired)->format('F d, Y') }}
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Created At</th>
                                <td class="text-muted small">{{ $employee->created_at->format('M d, Y h:i A') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Last Updated</th>
                                <td class="text-muted small">{{ $employee->updated_at->format('M d, Y h:i A') }}</td>
                            </tr>
                        </table>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Back to List
                            </a>
                            <div>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning px-4">
                                    Edit Profile
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this employee record permanently?')">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>