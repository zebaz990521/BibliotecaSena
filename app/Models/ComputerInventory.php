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
        'internal_code',
        'barcode',
        'location',
        'status',
        'book_id',
    ];



     public function computerRentals(): HasMany
    {
        return $this->hasMany(ComputerRental::class);
    }
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
