<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookInventory extends Model
{
    //

    protected $fillable = [
        'internal_code',
        'barcode',
        'location',
        'status',
        'book_id',
    ];





    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }


     public function bookRentals(): BelongsToMany
    {
        return $this->belongsToMany(BookRental::class, 'detail_rentals')
                    ->withTimestamps();
    }

    public function detailRentals(): HasMany
    {
        return $this->hasMany(DetailRental::class);
    }
}
