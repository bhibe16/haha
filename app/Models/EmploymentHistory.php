<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentHistory extends Model
{
    use HasFactory;

    // Define the table associated with the model (optional if it follows Laravel's naming convention)
    protected $table = 'employment_histories';

    // Define the fillable attributes (adjust according to your database schema)
    protected $fillable = [
        'employee_id', // Foreign key referencing the Employee model
        'job_title',
        'company_name',
        'location',
        'job_responsibilities',
        'company_name',
        'start_date',
        'end_date',
        'description',
    ];

    // Define relationships
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
