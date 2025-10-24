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
        Schema::create('page4_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('apar_forms')->onDelete('cascade');
            $table->longText('publications_reports')->nullable();
            $table->longText('government_missions')->nullable();
            $table->longText('gem_portal_work')->nullable();
            $table->longText('property_return_filing')->nullable();
            $table->foreignId('added_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
            
            $table->index(['form_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page4_data');
    }
};
