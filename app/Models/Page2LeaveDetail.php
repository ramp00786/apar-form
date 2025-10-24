<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page2LeaveDetail extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'page2_leave_details';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'form_id',
        'nature_of_leave',
        'period',
        'no_of_days',
        'added_by',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'form_id' => 'integer',
        'added_by' => 'integer',
        'no_of_days' => 'integer',
    ];

    /**
     * Get the APAR form that owns this leave detail.
     */
    public function form(): BelongsTo
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }

    /**
     * Get the user who added this leave detail.
     */
    public function addedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'added_by');
    }
}