<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->string('First_name');
        $table->string('Last_name');
        $table->string('Department');
        $table->string('Position');
        $table->string('Email');
        $table->string('Phone');
        $table->string('Address');
        $table->string('Date_of_birth');
        $table->string('Gender');
        $table->string('Nationality');
        $table->string('Marital_status');
        $table->string('Start_date');
        $table->string('Employment_status');
        $table->string('image')->nullable(); // Add this line
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
