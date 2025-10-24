<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page6Data extends Model
{
    use HasFactory;

    protected $table = 'apar_page6_data';

    protected $fillable = [
        'form_id',
        'relation_with_public',
        'training_recommendation', 
        'state_of_health'
    ];

    public function aparForm()
    {
        return $this->belongsTo(AparForm::class, 'form_id');
    }
}