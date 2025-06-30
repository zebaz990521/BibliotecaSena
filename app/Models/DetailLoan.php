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



    public function bookInventory(): BelongsTo
    {
        return $this->belongsTo(BookInventory::class);
    }

    public function computerInventory(): BelongsTo
    {
        return $this->belongsTo(ComputerInventory::class);
    }

    public function loan(): BelongsTo
    {
        return $this->belongsTo(Loan::class);
    }


}
