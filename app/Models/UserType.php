<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserType extends Model
{
    //

    protected $fillable = [
        'name',
    ];

    public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }


}
