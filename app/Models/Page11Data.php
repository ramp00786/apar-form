<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page11Data extends Model
{
    use HasFactory;

    protected $table = 'apar_page11_data';

    protected $fillable = [
        'form_id',
        'agree_evaluation',
        'innovative_summary',
        'exceptional_contribution',
        'parameter_name',
        'sub_parameters_label',
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