<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComputerRental extends Model
{
    //

    protected $fillable = [
        'identification_number',
        'ficha_id',
        'person_type_id',
        'computer_id',
        'phone_number',
        'datetime_exit',
        'datetime_in',
        'signature',
        'received',
    ];


    public function computer(): BelongsTo
    {
        return $this->belongsTo(Computer::class);
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

    


}
