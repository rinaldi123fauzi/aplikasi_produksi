<?php

namespace App\Models;

use App\Models\ProductionTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama_lokasi'
    ];

    public function production_transactions(){
        return $this->hasMany(ProductionTransaction::class);
    }
}
