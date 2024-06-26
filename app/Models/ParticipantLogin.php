<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipantLogin extends Model
{
    use HasFactory;

    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}
