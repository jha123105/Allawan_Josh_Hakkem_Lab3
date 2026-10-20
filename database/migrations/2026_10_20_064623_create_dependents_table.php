<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->id('dependent_id');
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('relationship', 25);

            $table->foreignId('employee_id')
                  ->constrained('employees', 'employee_id')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dependents');
    }
};