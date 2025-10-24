<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page5Data extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'page5_data';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'form_id',
        // Section A: Work Output
        'work_planned_reporting',
        'work_planned_reviewing', 
        'work_planned_initial',
        'scientific_achievements_reporting',
        'scientific_achievements_reviewing',
        'scientific_achievements_initial',
        'quality_output_reporting',
        'quality_output_reviewing',
        'quality_output_initial',
        'analytical_ability_reporting',
        'analytical_ability_reviewing',
        'analytical_ability_initial',
        'exceptional_work_reporting',
        'exceptional_work_reviewing',
        'exceptional_work_initial',
        'overall_work_output_reporting',
        'overall_work_output_reviewing',
        'overall_work_output_initial',
        
        // Section B: Personal Attributes  
        'attitude_work_reporting',
        'attitude_work_reviewing',
        'attitude_work_initial',
        'sense_responsibility_reporting',
        'sense_responsibility_reviewing',
        'sense_responsibility_initial',
        'maintenance_discipline_reporting',
        'maintenance_discipline_reviewing',
        'maintenance_discipline_initial',
        'communication_skills_reporting',
        'communication_skills_reviewing',
        'communication_skills_initial',
        'leadership_qualities_reporting',
        'leadership_qualities_reviewing',
        'leadership_qualities_initial',
        'team_spirit_reporting',
        'team_spirit_reviewing',
        'team_spirit_initial',
        'overall_personal_attributes_reporting',
        'overall_personal_attributes_reviewing',
        'overall_personal_attributes_initial',
        
        // Section C: Functional Competency
        'scientific_capability_reporting',
        'scientific_capability_reviewing',
        'scientific_capability_initial',
        'st_foresight_reporting',
        'st_foresight_reviewing',
        'st_foresight_initial',
        'decision_making_reporting',
        'decision_making_reviewing',
        'decision_making_initial',
        'innovation_creativity_reporting',
        'innovation_creativity_reviewing',
        'innovation_creativity_initial',
        'technical_competence_reporting',
        'technical_competence_reviewing',
        'technical_competence_initial',
        'new_initiative_reporting',
        'new_initiative_reviewing',
        'new_initiative_initial',
        'overall_functional_competency_reporting',
        'overall_functional_competency_reviewing',
        'overall_functional_competency_initial',
        
        'added_by',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'form_id' => 'integer',
        'added_by' => 'integer',
    ];

    /**
     * Get the APAR form that owns this page5 data.
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }

    /**
     * Get the user who added this page5 data.
     */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}