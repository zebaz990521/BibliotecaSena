<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TeamCategory extends Model
{
    //
    protected $fillable = [
        'category'
    ];

    public function computers(): HasMany
    {
        return $this->hasMany(Computer::class);
    }
}
