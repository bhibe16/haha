<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the total number of employees
        $totalEmployees = Employee::count();

        // Pass the total to the dashboard view
        return view('dashboard', ['totalEmployees' => $totalEmployees]);
    }
}
