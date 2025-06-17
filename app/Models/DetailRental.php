<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailRental extends Model
{
    //
    protected $fillable = [
        'book_rental_id',
        'book_id',
        'quantity'
    ];



    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function bookRental(): BelongsTo
    {
        return $this->belongsTo(BookRental::class);
    }
}
