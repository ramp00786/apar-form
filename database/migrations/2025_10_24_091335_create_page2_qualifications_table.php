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
        Schema::create('page2_qualifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('apar_forms')->onDelete('cascade');
            $table->string('qualification')->nullable();
            $table->string('year')->nullable();
            $table->string('university_institute')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('page2_qualifications');
    }
};
