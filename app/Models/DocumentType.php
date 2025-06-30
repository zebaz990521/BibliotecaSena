<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DocumentType extends Model
{
    //
    protected $fillable = [
        'document_type',
        'abbreviation'
    ];

    public function administratives(): HasMany
    {
        return $this->hasMany(Administrative::class);
    }


    public function teachers(): HasMany
    {
        return $this->hasMany(Teacher::class);
    }

    public function trainees(): HasMany
    {
        return $this->hasMany(Trainee::class);
    }
}
