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
        Schema::create('page1_educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id'); // Foreign key to apar_forms
            $table->string('qualification')->nullable();
            $table->string('year')->nullable();
            $table->string('university')->nullable();
            $table->string('remark')->nullable();
            $table->unsignedBigInteger('added_by'); // Logged in user ID
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');
            
            // Index for better performance
            $table->index(['form_id', 'added_by']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page1_educations');
    }
};
