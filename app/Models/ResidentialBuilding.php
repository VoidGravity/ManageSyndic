<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResidentialBuilding extends Model
{
    use HasFactory;

    // had many residents
    public function residents()
    {
        return $this->hasMany(Resident::class);
    }

    // had one syndic
    public function syndic()
    {
        return $this->belongsTo(Syndic::class);
    }
}
