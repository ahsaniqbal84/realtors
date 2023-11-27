<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('change_designations', function (Blueprint $table) {
            $table->id('change_designation_id');
            $table->foreignId('employee_id');
            $table->unsignedBigInteger('old_designation');
            $table->unsignedBigInteger('new_designation');
            //$table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('addedBy');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_designations');
    }
};
