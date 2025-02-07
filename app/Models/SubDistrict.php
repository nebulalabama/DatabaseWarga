<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'head'
    ];

    //relasi ke tabel residents
    public function residents()
    {
        return $this->hasMany(Resident::class, 'sub_district_id');
    }
}
