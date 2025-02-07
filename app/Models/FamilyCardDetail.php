<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCardDetail extends Model
{
    use HasFactory;

    protected $fillable = ['family_card_id', 'resident_id', 'status'];

    public function familyCard()
    {
        return $this->belongsTo(FamilyCard::class);
    }

    public function resident()
    {
        return $this->belongsTo(Resident::class, 'resident_id', 'id');
    }
}
