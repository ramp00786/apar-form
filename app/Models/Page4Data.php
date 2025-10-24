<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page4Data extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'page4_data';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'form_id',
        'publications_reports',
        'government_missions',
        'gem_portal_work',
        'property_return_filing',
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
     * Get the APAR form that owns this page4 data.
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }

    /**
     * Get the user who added this page4 data.
     */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}