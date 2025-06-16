<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'datetime_exit',
        'datetime_in',
    ];


    public function ficha()
    {
        return $this->belongsTo(Ficha::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personType()
    {
        return $this->belongsTo(PersonType::class);
    }
    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class, 'detail_rentals')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function detailRentals(): HasMany
    {
        return $this->hasMany(DetailRental::class);
    }
}
