<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeesMaster extends Model
{
    use HasFactory;
    public function feesType(): BelongsTo
    {
        return $this->belongsTo(FeesType::class);
    }
    public function feesGroup(): BelongsTo
    {
        return $this->belongsTo(FeesGroup::class);
    }
    public function feesAssigns(): HasMany
    {
        return $this->hasMany(FeesAssign::class);
    }
}
