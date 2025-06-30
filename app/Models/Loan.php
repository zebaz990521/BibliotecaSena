<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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

    public function loanType(): BelongsTo
    {
        return $this->belongsTo(LoanType::class);
    }

    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function administrative(): BelongsTo
    {
        return $this->belongsTo(Administrative::class);
    }

    public function teacher(): BelongsTo
    {
        return $this->belongsTo(Teacher::class);
    }

    public function trainee(): BelongsTo
    {
        return $this->belongsTo(Trainee::class);
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class);
    }

    public function computerIventories(): BelongsToMany
    {
        return $this->belongsToMany(ComputerInventory::class, 'detail_loans')
                        ->withTimestamps();
    }

    public function bookInventories(): BelongsToMany
    {
        return $this->belongsToMany(BookInventory::class, 'detail_loans')
                ->withTimestamps();
    }

    public function detailLoans(): HasMany
    {
        return $this->hasMany(DetailLoan::class);
    }









}
