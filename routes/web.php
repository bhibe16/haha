<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmploymentHistoryController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ImageUploadController;

Route::get('/', function () {
    return view('admin/login');
});

Route::get('/welcome', function () {
    return view('welcome'); // Ensure 'welcome.blade.php' exists in 'resources/views'
});

// Show the login form
Route::get('admin/hr/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('admin/hr/login', [LoginController::class, 'login'])->name('login.submit');

// **The correct dashboard route**
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// CRUD Routes for Employee
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('employee.destroy');

// Logout route
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Image upload route
Route::post('/image-upload', [ImageUploadController::class, 'upload'])->name('image.upload');

// Employment History Routes
Route::prefix('employee/{employee}')->group(function () {
    Route::get('/history', [EmploymentHistoryController::class, 'index'])->name('employee.history.index');
    Route::get('/history/create', [EmploymentHistoryController::class, 'create'])->name('employee.history.create');
    Route::post('/history', [EmploymentHistoryController::class, 'store'])->name('employee.history.store');
    Route::get('/history/{history}/edit', [EmploymentHistoryController::class, 'edit'])->name('employee.history.edit');
    Route::put('/history/{history}', [EmploymentHistoryController::class, 'update'])->name('employee.history.update');
    Route::delete('/history/{history}', [EmploymentHistoryController::class, 'destroy'])->name('employee.history.destroy');
});

Route::get('employee/{id}/history', [EmploymentHistoryController::class, 'show'])->name('employee.history');

Route::get('/employee/{id}/documents', [EmployeeController::class, 'documents'])->name('employee.documents');



Route::get('/employee/{id}/upload-document', [EmployeeController::class, 'showUploadForm'])->name('document.upload.form');
// Fix the method name here:
Route::get('employee/{id}/documents', [EmployeeController::class, 'documents'])->name('employee.documents');
Route::post('employee/{id}/upload', [EmployeeController::class, 'uploadDocument'])->name('employee.upload');
Route::delete('employee/{employee}/documents/{document}', [EmployeeController::class, 'destroyDocument'])->name('employee.document.delete');

// Contracts Routes
Route::get('/employee/{id}/contracts', [EmployeeController::class, 'contracts'])->name('employee.contracts');
Route::post('/employee/{id}/upload-contract', [EmployeeController::class, 'uploadContract'])->name('employee.uploadContract');
Route::delete('employee/{employee}/contracts/{contract}', [EmployeeController::class, 'destroyContract'])->name('employee.contract.delete');



