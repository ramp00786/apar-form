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
        Schema::create('apar_page10_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->string('parameter_name')->nullable();
            $table->string('sub_parameter_a')->nullable();
            $table->string('sub_parameter_b')->nullable();
            $table->string('sub_parameter_c')->nullable();
            $table->string('sub_parameter_d')->nullable();
            $table->string('sub_parameter_e')->nullable();
            $table->text('achievement_description')->nullable();
            $table->timestamps();
            
            $table->foreign('form_id')->references('id')->on('apar_forms')->onDelete('cascade');
            $table->index('form_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apar_page10_data');
    }
};
