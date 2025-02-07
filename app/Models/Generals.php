<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generals extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'head',
        'deputy_head',
        'treasurer',
        'secretary'
    ];
}
