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
        Schema::create('page9_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->text('scientific_technical_summary')->nullable();
            $table->text('new_initiatives')->nullable();
            $table->text('st_content_work')->nullable();
            $table->text('innovation_content_work')->nullable();
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
        Schema::dropIfExists('page9_data');
    }
};
