<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    //

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'isbn',
        'publication_year',
        'language',
        'pages',
        'category_id'
    ];



    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
   public function BookInventories(): HasMany
   {
        return $this->hasMany(BookInventory::class);
   }


}
