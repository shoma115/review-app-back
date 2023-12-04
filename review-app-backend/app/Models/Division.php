<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Lesson;
use App\Models\Department;

class Division extends Model
{
    use HasFactory;

    public function lessons() {
        return $this->hasMany(Lesson::class);
    }

    public function department() {
        return $this->belongsTo(Department::class);
    }
}
