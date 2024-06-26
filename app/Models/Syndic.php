<?php

namespace App\Models;

use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syndic extends Model
{
    use HasFactory;

    // had user
    public function user()
    {
        // had on user
        return $this->belongsTo(User::class, 'user_id');
    }

    // all
    public static function all($columns = ['*'])
    {
        $syndics = self::with('user')->whereHas('user', function ($query) {
            $query->where('role', UserRole::SYNDIC->value);
        })->get();
        return $syndics;
    }
    // get
    public static function get()
    {
        $syndics = self::with('user')->whereHas('user', function ($query) {
            $query->where('role', UserRole::SYNDIC->value);
        })->get();
        return $syndics;
    }
    // get
    public static function find($id)
    {
        // syndic
        $syndic = self::with('user')->find($id);
        return $syndic;
    }

    // building
    public function building()
    {
        return $this->belongsTo(ResidentialBuilding::class,'id', 'syndic_id');
    }
}
