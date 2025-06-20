<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Computer extends Model
{
    //

    protected $fillable = [
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
    ];


    public function computerInventories(): HasMany
    {
        return $this->hasMany(ComputerInventory::class);
    }






}
