<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page9Data extends Model
{
    use HasFactory;

    protected $table = 'apar_page9_data';

    protected $fillable = [
        'form_id',
        'scientific_technical_summary',
        'new_initiatives',
        'st_content_work',
        'innovation_content_work'
    ];

    public function aparForm()
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }
}