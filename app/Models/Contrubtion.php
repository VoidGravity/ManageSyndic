<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrubtion extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',     
        'data',
        'apartment_number',
        'residents_id',
        'syndics_id',
        'residents_id',
        'syndics_id'
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'residents_id');
    }

    public function syndic()
    {
        return $this->belongsTo(Syndic::class, 'syndics_id');
    }
}
