<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmploymentHistory; // Make sure to use the correct namespace
use App\Models\AdminHr;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
    }

    public function create(){
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Validate the form inputs
        $validatedData = $request->validate([
            'First_name' => 'required|string',
            'Last_name' => 'required|string',
            'Department' => 'required|string',
            'Position' => 'required|string',
            'Email' => 'required|string',
            'Phone' => 'required|string',
            'Address' => 'required|string',
            'Date_of_birth' => 'required|string',
            'Gender' => 'required|string',
            'Nationality' => 'required|string',
            'Marital_status' => 'required|string',
            'Start_date' => 'required|string',
            'Employment_status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
        ]);

        // Handle file upload
        if ($request->hasFile('image')) {
            // Store the image in the 'public' disk (storage/app/public) and get the path
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath; // Store the image path in the DB
        }

        // Save the employee record
        Employee::create($validatedData);

        return redirect()->route('employee.index')->with('success', 'New Employee created successfully.');
    }

    public function edit(Employee $employee){
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request){
        $data = $request->validate([
            'First_name' => 'required',
            'Last_name' => 'required',
            'Department' => 'required',
            'Position' => 'nullable',
            'Email' => 'required',
            'Phone' => 'required',
            'Address' => 'required',
            'Date_of_birth' => 'required',
            'Gender' => 'required',
            'Nationality' => 'required',
            'Marital_status' => 'required',
            'Start_date' => 'required',
            'Employment_status' => 'required',
        ]);

        $employee->update($data);

        return redirect(route('employee.index'))->with('success', 'Updated Successfully');
    }

    public function destroy(Employee $employee){
        $employee->delete();
        return redirect(route('employee.index'))->with('success', 'Deleted Successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        // Implement search logic here
    }

    public function history($employee)
{
    // Fetch the employee using the ID
    $employee = Employee::findOrFail($employee);
    
    // Fetch the employment history for this employee
    $history = EmploymentHistory::where('employee_id', $employee->id)->get(); 

    // Return the view with the employee and history data
    return view('employees.history.index', compact('employee', 'history'));
}

}
