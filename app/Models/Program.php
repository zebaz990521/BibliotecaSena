<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Program extends Model
{
    //
    protected $fillable = [
        'program_type_id',
        'program',
        'ficha'
    ];


    public function trainees(): HasMany
    {
        return $this->hasMany(Trainee::class);
    }

    public function programType(): BelongsTo
    {
        return $this->belongsTo(ProgramType::class);
    }
}
