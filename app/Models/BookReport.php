<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BookReport extends Model
{
    //

    protected $fillable = [
        'title',
        'description',
        'datetime_report',
        'book_rental_id'
    ];



    public function bookRental(): BelongsTo
    {
        return $this->belongsTo(BookRental::class);
    }
}
