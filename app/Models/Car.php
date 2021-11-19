<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function gas()
    {
        return $this->belongsTo(Gas::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function invoice(){
        return $this->hasMany(Invoice::class);
    }
}
