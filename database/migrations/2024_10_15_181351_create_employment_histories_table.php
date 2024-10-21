<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('employment_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade'); // Foreign key reference
            $table->string('job_title'); // Updated field name to match the controller
            $table->string('company_name'); // Updated field name to match the controller
            $table->string('location');
            $table->string('job_responsibilities');
            $table->date('start_date');
            $table->date('end_date')->nullable(); // Nullable in case the employee is still employed
            $table->text('description')->nullable(); // Optional description
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employment_histories');
    }
}
