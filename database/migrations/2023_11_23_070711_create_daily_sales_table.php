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
        Schema::create('daily_sales', function (Blueprint $table) {
            $table->id('sale_id');
            $table->foreignId('customer_id');
            $table->foreignId('project_id');
            $table->foreignId('employee_id');
            $table->foreignId('team_id')->nullable()->default(null);
            $table->unsignedBigInteger('investment_amount');
            $table->unsignedBigInteger('created_by')->nullable()->default(null);
            $table->unsignedBigInteger('update_by')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->foreign('project_id')->references('project_id')->on('projects');
            $table->foreign('employee_id')->references('employee_id')->on('employees');
            $table->foreign('team_id')->references('team_id')->on('teams');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_sales');
    }
};
