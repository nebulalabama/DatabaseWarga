<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_kk',
        'resident_id'
    ];

    public function details()
    {
        return $this->hasMany(FamilyCardDetail::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id', 'id');
    }
}
