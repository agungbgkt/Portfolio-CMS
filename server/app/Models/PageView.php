<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

class PageView extends Model
{
    protected $fillable = [
        'path',
        'project_id',
        'ip_hash',
        'user_agent',
        'viewed_at',
    ];
    public function casts(): array
    {
        return[
            'viewed_at' => 'datetime',
        ];
    }
    public function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }
}
