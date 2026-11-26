<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Schedule extends Model
{
    protected $table = 'schedules';
    protected $fillable = [
        'title',
        'description',
        'scheduled_date',
        'start_date',
        'end_time',
        'is_completed',
    ];
    public function casts(): array
    {
        return[
            'scheduled_date' => 'date',
            'is_completed' => 'boolean',
        ];
    }
}
