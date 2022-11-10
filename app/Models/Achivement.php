<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achivement extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'time_from',
        'time_to'
    ];
}
