<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class migrations extends Model
{
    use HasFactory;

    protected $table = 'migration';

    protected $fillable = [
        'id',
        'resident_id',
        'date',
        'from',
        'to',
        'cause',
        'migration_type',
    ];

    public function residents()
    {
        return $this->belongsTo(Resident::class, 'resident_id', 'id');
    }
}
