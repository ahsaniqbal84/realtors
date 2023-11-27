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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('project_id');
            $table->string('name',255);
            $table->string('city',100);
            $table->string('address')->nullable();
            $table->char('slug',50);
            $table->unsignedBigInteger('target_amount')->nullable()->default(null);
            $table->unsignedSmallInteger('no_of_floor')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
