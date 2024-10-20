<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmploymentHistory; // Make sure to use the correct namespace
use App\Models\AdminHr;
use App\Models\Document; // Import the Document model
use App\Models\Contract;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    public function index()
    {
        // Fetch all employees
        $employees = Employee::all();
    
        // Return the main employee list view
        return view('employees.index', ['employees' => $employees]);
    }
    

    public function create()
    {
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

    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request)
    {
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

    public function destroy(Employee $employee)
    {
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

    public function documents($id)
{
    // Retrieve the employee and their documents
    $employee = Employee::with('documents')->find($id);

    // Check if the employee exists
    if (!$employee) {
        return redirect()->back()->with('error', 'Employee not found.');
    }

    // Return the view for the documents
    return view('employees.documents.index', compact('employee'));
}
public function uploadDocument(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'file' => 'required|file|mimes:pdf,xlsx,xls,docx,doc|max:2048', // Adjusted to include Excel and Word formats
    ]);

    if ($request->hasFile('file')) {
        // Debugging: Check if the file is received
        \Log::info('File received:', ['file' => $request->file('file')]);

        // Handle the file upload
        $path = $request->file('file')->store('documents', 'public');

        // Create the new document
        $document = new Document();
        $document->employee_id = $id;
        $document->name = $request->input('name');
        $document->file_path = $path;
        $document->save();

        return redirect()->route('employee.documents', ['id' => $id])
                         ->with('success', 'Document uploaded successfully.');
    } else {
        \Log::warning('No file uploaded');
        return redirect()->back()->with('error', 'No file uploaded.');
    }
}

public function contracts($id)
{
    // Retrieve the employee and their contracts
    $employee = Employee::with('contracts')->find($id);

    // Check if the employee exists
    if (!$employee) {
        return redirect()->back()->with('error', 'Employee not found.');
    }

    // Return the view for the contracts
    return view('employees.contracts.index', compact('employee'));
}

public function uploadContract(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'name' => 'required|string|max:255',
        'file' => 'required|file|mimes:pdf,xlsx,xls,docx,doc|max:2048', // Adjusted to include Excel and Word formats
    ]);

    if ($request->hasFile('file')) {
        // Debugging: Check if the file is received
        \Log::info('File received:', ['file' => $request->file('file')]);

        // Handle the file upload
        $path = $request->file('file')->store('contracts', 'public');

        // Create the new contract
        $contract = new Contract();
        $contract->employee_id = $id;
        $contract->name = $request->input('name');
        $contract->file_path = $path;
        $contract->save();

        return redirect()->route('employee.contracts', ['id' => $id])
                         ->with('success', 'Contract uploaded successfully.');
    } else {
        \Log::warning('No file uploaded');
        return redirect()->back()->with('error', 'No file uploaded.');
    }
}


}