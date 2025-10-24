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
        Schema::create('page6_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('form_id');
            $table->text('relation_with_public')->nullable();
            $table->text('training_recommendation')->nullable();
            $table->text('state_of_health')->nullable();
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
        Schema::dropIfExists('page6_data');
    }
};
