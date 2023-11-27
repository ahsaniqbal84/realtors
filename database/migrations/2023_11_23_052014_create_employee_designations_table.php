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
        Schema::create('employee_designations', function (Blueprint $table) {
            $table->id('designation_id');
            $table->string('name',255);
            $table->decimal('commission',8,2)->default(2.5);
            $table->unsignedBigInteger('target')->default(3_000_000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_designations');
    }
};
