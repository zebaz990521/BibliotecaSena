<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    //

    protected $fillable = [
        'internal_code',
        'barcode',
        'title',
        'author',
        'publisher',
        'isbn',
        'publication_year',
        'category_id',
        'language',
        'pages',
        'available',
        'stock',
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function bookRentals(): BelongsToMany
    {
        return $this->belongsToMany(BookRental::class, 'detail_rentals')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function detailRentals(): HasMany
    {
        return $this->hasMany(DetailRental::class);
    }


}
