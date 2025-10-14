<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ctgry extends Model
{
     protected $fillable = ['code','categoryname', 'description'];

    public function drinks(): HasMany
    {
        return $this->hasMany(Drink::class);
    }
}
