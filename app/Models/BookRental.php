<?php

namespace App\Models;

use HashContext;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookRental extends Model
{
    //


    protected $fillable = [
        'identification_number',
        'name',
        'ficha_id',
        'user_id',
        'person_type_id',
        'phone_number',
        'datetime_out',
        'datetime_in',
    ];


    public function ficha(): BelongsTo
    {
        return $this->belongsTo(Ficha::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function personType(): BelongsTo
    {
        return $this->belongsTo(PersonType::class);
    }
    public function bookInventories(): BelongsToMany
    {
        return $this->belongsToMany(BookInventory::class, 'detail_rentals')
                    ->withTimestamps();
    }

    public function detailRentals(): HasMany
    {
        return $this->hasMany(DetailRental::class);
    }

    public function bookReports(): HasMany
    {
        return $this->hasMany(BookReport::class);
    }
}
