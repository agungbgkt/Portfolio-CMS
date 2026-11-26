<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

class Profile extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'headline',
        'short_bio',
        'about_description',
        'avatar_url',
        'resume_url',
        'email_public',
        'phone',
        'location',
        'social_links',
        'years_of_experience',
    ];
    protected function casts(): array{
        return[
            'social_links' => 'array',
            'years_of_experience' => 'integer',
        ];
    }
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
