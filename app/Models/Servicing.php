<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicing extends Model
{
    use HasFactory;

    
    // had one residential building
    public function residentialBuilding()
    {
        return $this->belongsTo(ResidentialBuilding::class);
    }
}
