<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AccessoryDetail extends Model
{
    //


    protected $fillable = [
        'accessory_id',
        'computer_id'
    ];


    public function accessory(): BelongsTo
    {
        return $this->belongsTo(Accessory::class);
    }

    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class);
    }
}
