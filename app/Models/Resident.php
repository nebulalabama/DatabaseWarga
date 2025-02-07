<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'nik',
        'name',
        'pob',
        'dob',
        'gender',
        'religion',
        'last_education',
        'citizenship',
        'marital_status',
        'sub_district_id',
        'neighborhood_id',
        'community_unit_id',
    ];

    //relasi ke tabel sub_districts
    public function sub_districts()
    {
        return $this->belongsTo(SubDistrict::class, 'sub_district_id');
    }

    //relasi ke tabel neighborhoods
    public function neighborhoods(){
        return $this->belongsTo(Neighborhoods::class, 'neighborhood_id');
    }

    //relasi ke tabel community_units
    public function community_units(){
        return $this->belongsTo(CommunityUnits::class, 'community_unit_id');
    }

    //relasi ke tabel family_card_details
    // public function family_card_details(){
    //     return $this->belongsTo(FamilyCardDetail::class, 'family_card_detail_id');
    // }

    // relasi ke tabel family_cards
    public function family_cards(){
        return $this->hasMany(FamilyCard::class);
    }

    //relasi ke tabel documents
    // public function documents(){
    //     return $this->hasMany(Document::class, 'document_id');
    // }

    //relasi ke tabel migrations
    // public function migrations(){
    //     return $this->hasMany(Migration::class, 'migration_id');
    // }
}
