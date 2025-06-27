<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //
    protected $fillable = [
        'document_type_id',
        'first_name',
        'last_name',
        'identification',
        'phone_number'
    ];
}
