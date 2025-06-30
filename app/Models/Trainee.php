<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

     public function loans(): HasMany
    {
        return $this->hasMany(Loan::class);
    }

    public function documentType(): BelongsTo
    {
        return $this->belongsTo(DocumentType::class);
    }

    public function program(): BelongsTo
    {
        return $this->belongsTo(Program::class);
    }

}
