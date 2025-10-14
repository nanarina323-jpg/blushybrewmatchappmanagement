<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dcategory extends Model
{
    protected $fillable = ['code','categoryname', 'description'];

    public function drinks(): HasMany
    {
        return $this->hasMany(Drink::class);
    }
}
