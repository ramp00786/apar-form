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
        Schema::table('forms', function (Blueprint $table) {
            // Make the following fields nullable
            $table->string('employee_id')->nullable()->change();
            $table->date('date_of_birth')->nullable()->change();
            $table->string('section_or_group')->nullable()->change();
            $table->string('area_of_specialization')->nullable()->change();
            $table->date('date_of_joining')->nullable()->change();
            $table->string('email')->nullable()->change();
            $table->string('mobile_no')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            // Revert fields back to not nullable (if data allows)
            $table->string('employee_id')->nullable(false)->change();
            $table->date('date_of_birth')->nullable(false)->change();
            $table->string('section_or_group')->nullable(false)->change();
            $table->string('area_of_specialization')->nullable(false)->change();
            $table->date('date_of_joining')->nullable(false)->change();
            $table->string('email')->nullable(false)->change();
            $table->string('mobile_no')->nullable(false)->change();
        });
    }
};
