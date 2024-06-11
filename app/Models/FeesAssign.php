<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeesAssign extends Model
{
    use HasFactory;
    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
    public function feesMaster(): BelongsTo
    {
        return $this->belongsTo(FeesMaster::class);
    }
    public function feesCollects(): HasMany
    {
        return $this->hasMany(FeesCollect::class);
    }
}
