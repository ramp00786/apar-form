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
        Schema::create('apar_forms', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name');
            $table->string('designation');
            $table->string('employee_id');
            $table->date('date_of_birth');
            $table->string('section_or_group');
            $table->string('area_of_specialization');
            $table->date('date_of_joining');
            $table->string('email');
            $table->string('mobile_no');
            $table->year('report_year');
            $table->string('department')->nullable();
            $table->enum('status', ['draft', 'in_progress', 'completed'])->default('draft');
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apar_forms');
    }
};
