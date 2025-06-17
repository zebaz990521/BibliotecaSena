<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Accessory extends Model
{
    //

    protected $fillable = [
        'name',
        'code',
    ];

    public function computers(): BelongsToMany
    {
        return $this->belongsToMany(Computer::class, 'accessory_details')
                    ->withTimestamps();
    }


    public function accessoryDetails(): HasMany
    {
        return $this->hasMany(AccessoryDetail::class);
    }
}
