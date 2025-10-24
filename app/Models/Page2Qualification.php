<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page2Qualification extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'page2_qualifications';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'form_id',
        'qualification',
        'year',
        'university_institute',
        'remark',
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
     * Get the APAR form that owns this qualification.
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }

    /**
     * Get the user who added this qualification.
     */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}