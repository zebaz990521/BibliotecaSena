<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PersonType extends Model
{
    //

    protected $fillable = [
        'name',
    ];


    public function computerRentals(): HasMany
    {
        return $this->hasMany(ComputerRental::class);
    }


    public function bookRentals(): HasMany
    {
        return $this->hasMany(BookRental::class);
    }
}
