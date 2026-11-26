<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Education extends Model
{
    protected $table = 'educations';
    protected $fillable = [
        'institution',
        'degree',
        'field_of_study',
        'start_date',
        'end_date',
        'description',
        'sort_order',
    ];
    public function casts(): array{
        return[
            'start_date' => 'date',
            'end_date' => 'date',
            'sort_order' => 'integer',
        ];
    }
}
