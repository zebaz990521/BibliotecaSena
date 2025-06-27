<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    //
    protected $fillable = [
        'document_type_id',
        'first_name',
        'program_id',
        'last_name',
        'identification',
        'phone_number'
    ];
}
