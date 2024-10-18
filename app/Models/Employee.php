<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'First_name',
        'Last_name',
        'Department',
        'Position',
        'Email',
        'Phone',
        'Address',
        'Date_of_birth',
        'Gender',
        'Nationality',
        'Marital_status',
        'Start_date',
        'Employment_status',
        'image'
    ];

    public function documents()
    {
        return $this->hasMany(Document::class); // Assuming you have a Document model
    }
}
