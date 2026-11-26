<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = 'certifications';
    protected $fillable = [
        'name',
        'issuer',
        'issue_date',
        'credential_url',
        'file_url',
    ];
    public function casts(): array
    {
        return[
            'issue_date' => 'date',
        ];
    }
}
