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
        Schema::table('employees', function (Blueprint $table) {
            //$table->unsignedBigInteger('office_id')->nullable()->default(null);
            //$table->unsignedBigInteger('department_id')->nullable()->default(null);
            //$table->unsignedBigInteger('team_id')->nullable()->default(null);
            
            //$table->foreignId('office_id')->constrained('offices','office_id')->nullable()->default(null)->after('employee_id');
            //$table->foreignId('office_id')->references('office_id')->on('offices')->nullable()->default(null)->after('employee_id');
            //$table->foreignId('department_id')->references('department_id')->on('departments')->nullable()->default(null)->after('office_id');
            //$table->foreignId('team_id')->references('team_id')->on('teams')->nullable()->default(null)->after('department_id');


            $table->foreignId('office_id')->nullable()->default(null)->after('employee_id');
            $table->foreign('office_id')->references('office_id')->on('offices');

            $table->foreignId('department_id')->nullable()->default(null)->after('office_id');
            $table->foreign('department_id')->references('department_id')->on('departments');

            $table->foreignId('team_id')->nullable()->default(null)->after('department_id');
            $table->foreign('team_id')->references('team_id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('office_id');
            $table->dropColumn('department_id');
            $table->dropColumn('team_id');

            $table->dropForeign(['office_id']);
            $table->dropForeign(['department_id']);
            $table->dropForeign(['team_id']);
        });
    }
};
