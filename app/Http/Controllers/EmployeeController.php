<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmploymentHistory;
use App\Models\AdminHr;
use App\Models\Document;
use App\Models\Contract;
use Illuminate\Support\Facades\Storage;
use NoCaptcha\Facades\NoCaptcha;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'First_name' => 'required|string',
            'Last_name' => 'required|string',
            'Department' => 'required|string',
            'Position' => 'required|string',
            'Email' => 'required|string|email',
            'Phone' => 'required|string',
            'Address' => 'required|string',
            'Date_of_birth' => 'required|date',
            'Gender' => 'required|string',
            'Nationality' => 'required|string',
            'Marital_status' => 'required|string',
            'Start_date' => 'required|date',
            'Employment_status' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'));
            $validatedData['image'] = $imagePath;
        }

        Employee::create($validatedData);
        return redirect()->route('employee.index')->with('success', 'New Employee created successfully.');
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', ['employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'First_name' => 'required|string|max:255',
            'Last_name' => 'required|string|max:255',
            'Department' => 'nullable|string|max:255',
            'Position' => 'nullable|string|max:255',
            'Email' => 'required|email|max:255',
            'Phone' => 'nullable|string|max:20',
            'Address' => 'nullable|string|max:255',
            'Date_of_birth' => 'nullable|date',
            'Gender' => 'nullable|string|max:20',
            'Nationality' => 'nullable|string|max:50',
            'Marital_status' => 'nullable|string|max:20',
            'Employment_status' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee->update($validatedData);

        if ($request->hasFile('image')) {
            $imagePath = $this->uploadImage($request->file('image'));
            $employee->image = $imagePath;
            $employee->save();
        }

        return redirect()->route('employee.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect(route('employee.index'))->with('success', 'Deleted Successfully');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $employees = Employee::where('First_name', 'like', "%{$query}%")
                            ->orWhere('Last_name', 'like', "%{$query}%")
                            ->get();
        return view('employees.index', ['employees' => $employees]);
    }

    public function history($employee)
    {
        $employee = Employee::findOrFail($employee);
        $history = EmploymentHistory::where('employee_id', $employee->id)->get();
        return view('employees.history.index', compact('employee', 'history'));
    }

    public function documents($id)
    {
        $employee = Employee::with('documents')->find($id);
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }
        return view('employees.documents.index', compact('employee'));
    }

    public function uploadDocument(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,xlsx,xls,docx,doc|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('documents', 'public');
            Document::create([
                'employee_id' => $id,
                'name' => $request->input('name'),
                'file_path' => $path,
            ]);

            return redirect()->route('employee.documents', ['id' => $id])
                             ->with('success', 'Document uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file uploaded.');
    }

    public function destroyDocument(Employee $employee, Document $document)
    {
        if ($document->employee_id !== $employee->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        Storage::delete($document->file_path);
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    public function contracts($id)
    {
        $employee = Employee::with('contracts')->find($id);
        if (!$employee) {
            return redirect()->back()->with('error', 'Employee not found.');
        }
        return view('employees.contracts.index', compact('employee'));
    }

    public function uploadContract(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,xlsx,xls,docx,doc|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('contracts', 'public');
            Contract::create([
                'employee_id' => $id,
                'name' => $request->input('name'),
                'file_path' => $path,
            ]);

            return redirect()->route('employee.contracts', ['id' => $id])
                             ->with('success', 'Contract uploaded successfully.');
        }

        return redirect()->back()->with('error', 'No file uploaded.');
    }

    public function destroyContract(Employee $employee, Contract $contract)
    {
        if ($contract->employee_id !== $employee->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        Storage::delete($contract->file_path);
        $contract->delete();

        return redirect()->back()->with('success', 'Contract deleted successfully.');
    }

    // Reusable image upload method
    private function uploadImage($image)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $imagePath = $image->storeAs('public/images', $imageName);
        return 'images/' . $imageName; // Return the relative path
    }

   
}
