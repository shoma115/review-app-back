<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Department;

class Faculty extends Model
{
    use HasFactory;

    public function departments() {
        return $this->haMany(Department::class);
    }
}
