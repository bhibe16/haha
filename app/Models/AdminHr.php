<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use Authenticatable
use Illuminate\Notifications\Notifiable;

class AdminHr extends Authenticatable // Change this line
{
    use HasFactory, Notifiable;

    protected $table = 'admin_hr'; // Set the correct table name

    // Specify other properties, like fillable, if necessary
    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}