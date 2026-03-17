<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee - {{ $employee->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning py-3 text-dark">
                        <h3 class="mb-0 h5 fw-bold">Edit Employee Profile</h3>
                    </div>
                    <div class="card-body p-4">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label fw-bold">Employee ID</label>
                                    <input type="text" class="form-control" name="employee_id" 
                                           value="{{ old('employee_id', $employee->employee_id) }}" placeholder="e.g. 2024-001" required>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label class="form-label fw-bold">Full Name</label>
                                    <input type="text" class="form-control bg-white" name="name" 
                                           value="{{ old('name', $employee->name) }}" placeholder="Enter full name" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" class="form-control" name="email" 
                                       value="{{ old('email', $employee->email) }}" placeholder="employee@company.com" required>
                            </div>

                            <div class="row">
                                <label class="form-label fw-bold">Department</label>
                                <select class="form-select" name="department" required>
                                    @foreach(['IT', 'HR', 'Finance', 'Marketing', 'Operations'] as $dept)
                                        <option value="{{ $dept }}" {{ old('department', $employee->department) == $dept ? 'selected' : '' }}>
                                            {{ $dept }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Date Hired</label>
                                <input type="date" class="form-control" name="date_hired" 
                                       value="{{ old('date_hired', $employee->date_hired) }}" required>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('employees.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                                <button type="submit" class="btn btn-warning px-4 fw-bold">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>