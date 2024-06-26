<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicing extends Model
{
    use HasFactory;

    protected $table = 'servicing';
    
    // had one residential building
    public function Building()
    {
        return $this->belongsTo(ResidentialBuilding::class, 'residential_buildings_id');
    }
}
