<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComputerReport extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'datetime_report',
        'computer_rental_id'
    ];


    public function computerRental(): BelongsTo
    {
        return $this->belongsTo(ComputerRental::class);
    }
}
