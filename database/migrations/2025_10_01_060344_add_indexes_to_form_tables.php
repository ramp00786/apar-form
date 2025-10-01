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
            $table->index(['created_by', 'status']);
            $table->index('report_year');
            $table->index('created_at');
        });

        Schema::table('form_data', function (Blueprint $table) {
            $table->index(['form_id', 'section']);
            $table->index('section');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropIndex(['created_by', 'status']);
            $table->dropIndex(['report_year']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('form_data', function (Blueprint $table) {
            $table->dropIndex(['form_id', 'section']);
            $table->dropIndex(['section']);
        });
    }
};
