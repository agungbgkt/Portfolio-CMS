<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Service extends Model
{
    protected $table = 'services';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'icon',
        'is_published',
        'sort_order',
    ];
    public function casts(): array
    {
        return[
            'is_published' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
