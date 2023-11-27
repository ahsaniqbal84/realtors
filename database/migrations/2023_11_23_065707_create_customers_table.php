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
        Schema::create('customers', function (Blueprint $table) {
            $table->id('customer_id');
            $table->foreignId('employee_id')->nullable()->default(null);
            $table->string('first_name',100);
            $table->string('last_name',100);
            $table->char('cnic',20)->nullable()->default(null);
            $table->string('address');
            $table->boolean('status')->default(true);
            //$table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('update_by')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('employee_id')->references('employee_id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
