<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee; 

class EmployeeController extends Controller
{
    /**
     * Display a listing of employees with Search and Department Filter.
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        // Search by Name or Employee ID
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('employee_id', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by Department
        if ($request->filled('department_filter')) {
            $query->where('department', $request->department_filter);
        }

        $employees = $query->latest()->paginate(10);
        
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee profile.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created employee.
     */
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|string|unique:employees,employee_id',
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:employees,email',
            'department'  => 'required|string',
            'date_hired'  => 'required|date',
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specific employee profile.
     */
    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the employee profile.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the employee record.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            // Sinisiguro natin na ang 'unique' check ay hindi mag-e-error sa sarili niyang ID
            'employee_id' => 'required|string|unique:employees,employee_id,' . $id,
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|unique:employees,email,' . $id,
            'department'  => 'required|string',
            'date_hired'  => 'required|date',
        ]);

        $employee = Employee::findOrFail($id);
        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the employee.
     */
    public function destroy(string $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee removed successfully.');
    }
}