<?php

namespace App\Models;

use App\Enums\PersonState;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    protected $casts = [
        'state' => PersonState::class
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class)
            ->withPivot('order')
            ->orderBy('order');
    }
}
