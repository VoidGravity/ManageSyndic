<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    // has one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // has one residential building
    public function Building()
    {
        return $this->belongsTo(ResidentialBuilding::class, 'residential_buildings_id');
    }

    // has many Contribution
    public function Contributions()
    {
        return $this->hasMany(Contrubtion::class);
    }

    
}
