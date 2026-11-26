<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'slug',
        'summary',
        'description',
        'thumbnail_url',
        'github_url',
        'demo_url',
        'is_featured',
        'status',
        'views_count',
        'completed_at',
    ];
    public function casts(): array
    {
        return[
            'is_featured' => 'boolean',
            'views_count' => 'integer',
            'completed_at' => 'date'
        ];
    }
    public function technologies(): BelongsToMany{
        return $this->belongsToMany(Technology::class, 'project_technology');
    }
    public function images(): HasMany{
        return $this->hasMany(ProjectImage::class)->orderBy('sort_order');
    }
    public function pageViews(): HasMany{
        return $this->hasMany(PageView::class);
    }
}
