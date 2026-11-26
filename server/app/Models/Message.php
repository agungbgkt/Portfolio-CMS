<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Override;

class Message extends Model
{
    use SoftDeletes;
    protected $table = 'messages';
    protected $fillable = [
        'sender_name',
        'sender_email',
        'subject',
        'body',
        'category',
        'is_read',
    ];
    public function casts(): array
    {
        return[
            'is_read' => 'boolean',
        ];
    }
}
