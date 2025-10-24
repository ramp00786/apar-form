<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page7Data extends Model
{
    use HasFactory;

    protected $table = 'page7_data';

    protected $fillable = [
        'form_id',
        'integrity_assessment',
        'pen_picture_reporting',
        'overall_numerical_grading'
    ];

    public function aparForm()
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }
}