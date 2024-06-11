<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeesCollect extends Model
{
    use HasFactory;
    public function feesAssign(): BelongsTo
    {
        return $this->belongsTo(FeesAssign::class);
    }
}
