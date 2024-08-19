<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Routine extends Model
{
    use HasFactory;
    protected $table = 'routiens';
    protected $fillable = [
        'standard_id',
        'routien',
    ];
    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }
}
