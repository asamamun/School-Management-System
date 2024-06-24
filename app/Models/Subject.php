<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'type',
        'version',
        'status'
];
public function standards(): BelongsToMany
 {
 return $this->belongsToMany(Standard::class);
 }
public function users(): BelongsToMany
 {
 return $this->belongsToMany(User::class);
 }
 // Mark modele use
 public function marks(): HasMany
 {
 return $this->hasMany(Mark::class);
 }
}

