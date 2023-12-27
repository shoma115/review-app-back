<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\User;

class Review extends Model
{
    use HasFactory;

    public function lesson() {
        return $this->belongsTo(Lessn::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
