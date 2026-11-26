<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Skill extends Model
{
    protected $fillable = [
        'skill_categories_id',
        'name',
        'proficiency',
        'icon',
        'sort_order',
    ];
    public function casts(): array
    {
        return[
            'proficiency' => 'integer',
            'sort_order' => 'integer',
        ];
    }
    public function category(): BelongsTo{
        return $this->belongsTo(SkillCategory::class, 'skill_categories_id');
    }
}
