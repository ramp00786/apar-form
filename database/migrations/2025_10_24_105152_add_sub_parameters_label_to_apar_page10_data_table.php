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
        Schema::table('apar_page10_data', function (Blueprint $table) {
            $table->string('sub_parameters_label')->nullable()->after('parameter_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('apar_page10_data', function (Blueprint $table) {
            $table->dropColumn('sub_parameters_label');
        });
    }
};
