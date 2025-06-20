<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ComputerRental extends Model
{
    //

    protected $fillable = [
        'name',
        'identification_number',
        'ficha_id',
        'person_type_id',
        'computer_inventory_id',
        'phone_number',
        'datetime_out',
        'datetime_in',
        'signature',
        'received',
    ];


    public function computerInventories(): BelongsTo
    {
        return $this->belongsTo(ComputerInventory::class);
    }

    public function personType(): BelongsTo
    {
        return $this->belongsTo(PersonType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function ficha(): BelongsTo
    {
        return $this->belongsTo(Ficha::class);
    }

    public function computerReports(): HasMany
    {
        return $this->hasMany(ComputerReport::class);
    }




}
