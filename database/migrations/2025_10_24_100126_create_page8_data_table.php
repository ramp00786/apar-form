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
        Schema::create('page8_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->text('reviewing_remarks')->nullable();
            $table->enum('agree_with_reporting_officer', ['yes', 'no'])->nullable();
            $table->text('disagreement_reason')->nullable();
            $table->text('pen_picture_reviewing')->nullable();
            $table->text('overall_numerical_grading_reviewing')->nullable();
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
        Schema::dropIfExists('page8_data');
    }
};
