<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Loan extends Model
{
    //

    protected $fillable = [
        'user_delivery_id',
        'user_received_id',
        'user_type_id',
        'loan_type_id',
        'trainee_id',
        'teacher_id',
        'administratives_id',
        'datetime_in',
        'datetime_out',
        'signature',
    ];


   




}
