<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AparFormData extends Model
{
    protected $table = 'form_data';

    protected $fillable = [
        'form_id',
        'section',
        'field_name',
        'field_value'
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }
}
