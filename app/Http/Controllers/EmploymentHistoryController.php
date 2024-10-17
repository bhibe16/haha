<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmploymentHistory;
use Illuminate\Http\Request;

class EmploymentHistoryController extends Controller
{
    // List all employment history for a specific employee
    public function index($id)
    {
        // Fetch the employee using the ID
        $employee = Employee::findOrFail($id);
        
        // Fetch the employment history for this employee
        $history = EmploymentHistory::where('employee_id', $id)->get();

        // Return the view with the employee and history data
        return view('employees.history.index', compact('employee', 'history'));
    }

    // Show form to create new employment history
    public function create($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employees.history.create', compact('employee'));
    }

    // Store new employment history record
    public function store(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255', // Correct field name
            'company_name' => 'required|string|max:255', // Correct field name
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $validatedData['employee_id'] = $id; // Associate the employee ID
        EmploymentHistory::create($validatedData); // Create record

        return redirect()->route('employee.history.index', $id)->with('success', 'Employment history added successfully.');
    }

    // Show form to edit an existing employment history record
    public function edit($employeeId, $historyId)
    {
        $employee = Employee::findOrFail($employeeId);
        $history = EmploymentHistory::findOrFail($historyId);
        return view('employees.history.edit', compact('employee', 'history'));
    }

    // Update an existing employment history record
    public function update(Request $request, $employeeId, $historyId)
    {
        $history = EmploymentHistory::findOrFail($historyId);

        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255', // Match the migration field name
            'company_name' => 'required|string|max:255', // Match the migration field name
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $history->update($validatedData);

        return redirect()->route('employee.history.index', $employeeId)->with('success', 'Employment history updated successfully.');
    }

    // Delete an employment history record
    public function destroy($employeeId, $historyId)
    {
        $history = EmploymentHistory::findOrFail($historyId);
        $history->delete();

        return redirect()->route('employee.history.index', $employeeId)->with('success', 'Employment history deleted successfully.');
    }
}
