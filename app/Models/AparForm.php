<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AparForm extends Model
{
    protected $table = 'forms';

    protected $fillable = [
        'employee_name',
        'designation',
        'employee_id',
        'date_of_birth',
        'section_or_group',
        'area_of_specialization',
        'date_of_joining',
        'email',
        'mobile_no',
        'report_year',
        'department',
        'status',
        'created_by'
    ];

    protected $casts = [
        'date_of_birth' => 'date',
        'date_of_joining' => 'date',
        'report_year' => 'integer'
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function formData(): HasMany
    {
        return $this->hasMany(AparFormData::class, 'form_id');
    }

    public function getFormDataBySection(string $section)
    {
        return $this->formData()->where('section', $section)->get()->pluck('field_value', 'field_name');
    }

    public function setFormDataBySection(string $section, array $data)
    {
        foreach ($data as $fieldName => $fieldValue) {
            AparFormData::updateOrCreate(
                [
                    'form_id' => $this->id,
                    'section' => $section,
                    'field_name' => $fieldName
                ],
                ['field_value' => $fieldValue]
            );
        }
    }

    public function hasSectionData(string $section): bool
    {
        return $this->formData()->where('section', $section)->whereNotNull('field_value')->where('field_value', '!=', '')->exists();
    }

    public function getSectionCompletionPercentage(string $section): int
    {
        $sectionData = $this->getFormDataBySection($section);
        $totalFields = $this->getExpectedFieldsForSection($section);
        $filledFields = $sectionData->filter(function ($value) {
            return !is_null($value) && $value !== '';
        })->count();

        return $totalFields > 0 ? (int) round(($filledFields / $totalFields) * 100) : 0;
    }

    private function getExpectedFieldsForSection(string $section): int
    {
        switch ($section) {
            case 'part_3':
                return 54; // All the assessment fields
            case 'part_4':
                return 6; // 6 main fields in part 4
            case 'part_5':
                return 5; // 5 main fields in part 5
            case 'part_b':
                return 15; // All part B fields including parameters
            default:
                return 0;
        }
    }
}
