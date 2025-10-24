<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page11OverallAssessment extends Model
{
    use HasFactory;

    protected $table = 'page11_overall_assessments';

    protected $fillable = [
        'form_id',
        'parameter_name',
        'sub_parameter_a',
        'sub_parameter_b',
        'sub_parameter_c',
        'sub_parameter_d',
        'sub_parameter_e',
        'marks_given',
        'max_marks'
    ];

    public function aparForm()
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }
}
