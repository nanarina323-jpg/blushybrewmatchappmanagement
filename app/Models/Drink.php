<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    protected $fillable = ['code','flavourname', 'ingredient', 'categorycode', 'price'];

    public function drinks(): BelongTo
    {
        return $this->belongTo(Ctgry::class);
    }
}
