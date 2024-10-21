<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade'); // Foreign key reference
            $table->string('name'); // Name of the document
            $table->string('file_path'); // Path to the document file
            $table->timestamps(); // Automatically manage created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}

