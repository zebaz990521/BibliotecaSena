<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailRental extends Model
{
    //
    protected $fillable = [
        'book_rental_id',
        'book_id',
        'quantity'
    ];



    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function bookRental()
    {
        return $this->belongsTo(BookRental::class);
    }
}
