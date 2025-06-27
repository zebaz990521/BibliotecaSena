<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailLoan extends Model
{
    //
    protected $fillable = [
        'loan_id',
        'book_inventory_id',
        'computer_inventory_id'
    ];



    public function book(): BelongsTo
    {
        return $this->belongsTo(BookInventory::class);
    }


}
