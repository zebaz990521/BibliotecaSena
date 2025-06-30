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
        'barcode',
        'location',
        'status',
        'book_id',
    ];





    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }

    public function loans(): BelongsToMany
    {
        return $this->belongsToMany(Loan::class, 'detail_loans')
            ->withTimestamps();
    }



}
