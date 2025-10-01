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
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->string('section', 50); // e.g., 'part_3', 'part_4', 'part_5', 'part_b'
            $table->string('field_name', 100);
            $table->text('field_value')->nullable();
            $table->timestamps();

            $table->foreign('form_id')->references('id')->on('apar_forms')->onDelete('cascade');
            $table->unique(['form_id', 'section', 'field_name']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_data');
    }
};
