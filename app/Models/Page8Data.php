<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page8Data extends Model
{
    use HasFactory;

    protected $table = 'page8_data';

    protected $fillable = [
        'form_id',
        'reviewing_remarks',
        'agree_with_reporting_officer',
        'disagreement_reason',
        'pen_picture_reviewing',
        'overall_numerical_grading_reviewing'
    ];

    public function aparForm()
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }
}