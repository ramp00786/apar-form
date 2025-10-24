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
        Schema::create('page5_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_id')->constrained('apar_forms')->onDelete('cascade');
            
            // Section A: Work Output
            $table->string('work_planned_reporting')->nullable();
            $table->string('work_planned_reviewing')->nullable();
            $table->string('work_planned_initial')->nullable();
            $table->string('scientific_achievements_reporting')->nullable();
            $table->string('scientific_achievements_reviewing')->nullable();
            $table->string('scientific_achievements_initial')->nullable();
            $table->string('quality_output_reporting')->nullable();
            $table->string('quality_output_reviewing')->nullable();
            $table->string('quality_output_initial')->nullable();
            $table->string('analytical_ability_reporting')->nullable();
            $table->string('analytical_ability_reviewing')->nullable();
            $table->string('analytical_ability_initial')->nullable();
            $table->string('exceptional_work_reporting')->nullable();
            $table->string('exceptional_work_reviewing')->nullable();
            $table->string('exceptional_work_initial')->nullable();
            $table->string('overall_work_output_reporting')->nullable();
            $table->string('overall_work_output_reviewing')->nullable();
            $table->string('overall_work_output_initial')->nullable();
            
            // Section B: Personal Attributes
            $table->string('attitude_work_reporting')->nullable();
            $table->string('attitude_work_reviewing')->nullable();
            $table->string('attitude_work_initial')->nullable();
            $table->string('sense_responsibility_reporting')->nullable();
            $table->string('sense_responsibility_reviewing')->nullable();
            $table->string('sense_responsibility_initial')->nullable();
            $table->string('maintenance_discipline_reporting')->nullable();
            $table->string('maintenance_discipline_reviewing')->nullable();
            $table->string('maintenance_discipline_initial')->nullable();
            $table->string('communication_skills_reporting')->nullable();
            $table->string('communication_skills_reviewing')->nullable();
            $table->string('communication_skills_initial')->nullable();
            $table->string('leadership_qualities_reporting')->nullable();
            $table->string('leadership_qualities_reviewing')->nullable();
            $table->string('leadership_qualities_initial')->nullable();
            $table->string('team_spirit_reporting')->nullable();
            $table->string('team_spirit_reviewing')->nullable();
            $table->string('team_spirit_initial')->nullable();
            $table->string('overall_personal_attributes_reporting')->nullable();
            $table->string('overall_personal_attributes_reviewing')->nullable();
            $table->string('overall_personal_attributes_initial')->nullable();
            
            // Section C: Functional Competency
            $table->string('scientific_capability_reporting')->nullable();
            $table->string('scientific_capability_reviewing')->nullable();
            $table->string('scientific_capability_initial')->nullable();
            $table->string('st_foresight_reporting')->nullable();
            $table->string('st_foresight_reviewing')->nullable();
            $table->string('st_foresight_initial')->nullable();
            $table->string('decision_making_reporting')->nullable();
            $table->string('decision_making_reviewing')->nullable();
            $table->string('decision_making_initial')->nullable();
            $table->string('innovation_creativity_reporting')->nullable();
            $table->string('innovation_creativity_reviewing')->nullable();
            $table->string('innovation_creativity_initial')->nullable();
            $table->string('technical_competence_reporting')->nullable();
            $table->string('technical_competence_reviewing')->nullable();
            $table->string('technical_competence_initial')->nullable();
            $table->string('new_initiative_reporting')->nullable();
            $table->string('new_initiative_reviewing')->nullable();
            $table->string('new_initiative_initial')->nullable();
            $table->string('overall_functional_competency_reporting')->nullable();
            $table->string('overall_functional_competency_reviewing')->nullable();
            $table->string('overall_functional_competency_initial')->nullable();
            
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
        Schema::dropIfExists('page5_data');
    }
};
