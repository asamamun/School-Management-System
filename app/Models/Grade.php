<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'marksfrom',
        'marksto',
        'remarks',
    ];

    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
}
