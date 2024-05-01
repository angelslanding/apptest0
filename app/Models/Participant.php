<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Participant extends Model
{
    use HasFactory;

    public function blogPosts()
    {
       return $this->hasMany(BlogPost::class);
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, ParticipantRole::class);
    }
}
