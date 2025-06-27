<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComputerInventory extends Model
{
    //

    protected $fillable = [
        'barcode',
        'location',
        'status',
        'team_category_id',
        'computer_id'
    ];



    public function accesories(): BelongsToMany
    {
        return $this->belongsToMany(Accessory::class, 'accessory_details')
                        ->withTimestamps();
    }

    public function accesoryDetails(): HasMany
    {
        return $this->hasMany(AccessoryDetail::class);
    }

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class);
    }
}
