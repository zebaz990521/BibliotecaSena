<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    //

    protected $fillable = [
        'name',
        'card_number',
    ];


    public function bookRentals()
    {
        return $this->hasMany(BookRental::class);
    }

    public function computerRentals()
    {
        return $this->hasMany(ComputerRental::class);
    }
}
