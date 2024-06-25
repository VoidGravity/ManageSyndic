<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    // had one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // had one residential building
    public function residentialBuilding()
    {
        return $this->belongsTo(ResidentialBuilding::class);
    }

    
}
