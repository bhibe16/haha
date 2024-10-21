<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    // Specify the table if it's not the plural form of the model name
    protected $table = 'contracts'; // Optional, Laravel assumes plural form

    // Specify the fillable fields
    protected $fillable = [
        'employee_id', // Foreign key to link to the Employee model
        'name',        // Name of the document
        'file_path',   // Path where the document is stored
        'created_at',  // Automatically managed by Laravel
        'updated_at',  // Automatically managed by Laravel
    ];

    // Define the relationship back to the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
<<<<<<< HEAD
}
=======
}

>>>>>>> 21da00b81c47fcf9d373c4a1150aa33edc9152f0
