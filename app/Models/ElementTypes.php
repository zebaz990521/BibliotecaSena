<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ElementTypes extends Model
{
    //

    protected $fillable = [
        'element'
    ];

    public function loans(): HasMany
    {
        return $this->hasMany(DetailLoan::class);
    }
}
