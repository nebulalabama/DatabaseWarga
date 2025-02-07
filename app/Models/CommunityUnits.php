<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Residents;

class CommunityUnits extends Model
{
    use HasFactory;

    protected $table = 'community_units';

    protected $fillable = [
        'name',
        'head',
    ];

    public function residents()
    {
        return $this->hasMany(Residents::class, 'community_units_id', 'id');
    }
}
