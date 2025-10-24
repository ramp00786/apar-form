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
        Schema::create('page7_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->text('integrity_assessment')->nullable();
            $table->text('pen_picture_reporting')->nullable();
            $table->text('overall_numerical_grading')->nullable();
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('apar_forms')->onDelete('cascade');
            $table->unique('form_id'); // One record per form
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page7_data');
    }
};
