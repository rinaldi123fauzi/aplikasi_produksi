<?php

namespace App\Models;

use App\Models\Location;
use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    use HasFactory;

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function item(){
        return $this->belongsTo(Item::class);
    }
}
