<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Division;
use App\Models\Faculty;

class Department extends Model
{
    use HasFactory;

    public function dvisions() {
        return $this->hasMany(Division::class);
    }

    public function faculty() {
        return $this->belongsTo(Faculty::class);
    }
}
