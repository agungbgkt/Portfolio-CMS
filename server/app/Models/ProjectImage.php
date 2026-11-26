<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

class ProjectImage extends Model
{
    protected $fillable = [
        'project_id',
        'image_url',
        'caption',
        'sort_order',
    ];
    public function casts(): array
    {
        return[
            'sort_order' => 'integer',
        ];
    }
    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }
}
