<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Experience extends Model
{
    protected $table = 'experiences';
    protected $fillable = [
        'title',
        'organization',
        'type',
        'location',
        'start_date',
        'end_date',
        'is_current',
        'description',
        'sort_order',
    ];
    #[Override]
    public function casts(): array
    {
        return[
            'start_date' => 'date',
            'end_date' => 'date',
            'is_current' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
