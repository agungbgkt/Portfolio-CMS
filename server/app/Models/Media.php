<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Override;

class Media extends Model
{
    protected $table = 'media';
    protected $fillable = [
        'file_name',
        'file_path',
        'file_url',
        'mime_type',
        'file_size',
    ];
    public function casts(): array
    {
        return[
            'file_size' => 'integer',
        ];
    }
}
