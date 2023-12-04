<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;

class Review extends Model
{
    use HasFactory;

    public function lessons() {
        return $this->belongsToMany(Lessn::class);
    }
}
