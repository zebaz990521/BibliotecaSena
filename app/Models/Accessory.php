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
    ];

    public function computerInventories(): BelongsToMany
    {
        return $this->belongsToMany(ComputerInventory::class, 'accessory_details')
                    ->withTimestamps();
    }


    public function accessoryDetails(): HasMany
    {
        return $this->hasMany(AccessoryDetail::class);
    }
}
