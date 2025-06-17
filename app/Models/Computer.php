<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    //

    protected $fillable = [
        'internal_code',
        'barcode',
        'brand',
        'model',
        'serial_number',
        'processor',
        'ram_size',
        'storage_size',
        'operating_system',
        'status',
        'location',
        'computer_type',
        'available'
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
}
