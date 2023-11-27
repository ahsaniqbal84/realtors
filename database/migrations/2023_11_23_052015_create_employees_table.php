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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->foreignId('designation_id')->nullable()->default(null);
            $table->char('first_name',100);
            $table->char('last_name',100);
            $table->char('gender',50)->default('male');
            $table->unsignedMediumInteger('code')->default(11);
            //$table->unsignedBigInteger('manager_id')->nullable()->default(null);
            $table->timestamp('join_date')->nullable()->default(null);
            $table->char('mobile_number',20)->nullable()->default(null);
            $table->char('city',100)->nullable()->default(null);
            $table->boolean('status')->default(false);
            $table->timestamp('resign_date')->nullable()->default(null);
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('update_by')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('designation_id')->references('designation_id')->on('employee_designations');
            
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
