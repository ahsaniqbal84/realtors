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
        Schema::create('zms', function (Blueprint $table) {
            $table->id('zm_id');
            $table->foreignId('employee_id');
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zms');
    }
};
