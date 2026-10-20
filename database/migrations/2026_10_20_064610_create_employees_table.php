<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('first_name', 20)->nullable();
            $table->string('last_name', 25);
            $table->string('email', 100);
            $table->string('phone_number', 20)->nullable();
            $table->date('hire_date')->nullable();
            
            // 1. Define the columns manually as unsignedBigInteger
            $table->unsignedBigInteger('job_id')->nullable();
            $table->decimal('salary', 8, 2)->nullable();
            $table->unsignedBigInteger('manager_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();

            $table->timestamps();

            // 2. Define the foreign keys manually to ensure perfect matches
            $table->foreign('job_id')->references('job_id')->on('hr_jobs')->nullOnDelete();
            $table->foreign('manager_id')->references('employee_id')->on('employees')->nullOnDelete();
            $table->foreign('department_id')->references('department_id')->on('departments')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};