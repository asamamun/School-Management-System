<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    use HasFactory;
    // use $fillable
    protected $fillable = 
    [
        'name',
        'term',
        'status'
    ];

    /**
     * Get the marks associated with the exam.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
    public function resultsheets(): HasMany
    {
        return $this->hasMany(Resultsheet::class);
    }
}
