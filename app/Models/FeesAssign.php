<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FeesAssign extends Model
{
    use HasFactory;
    protected $fillable = [
        'fees_group_id',
        'fees_type_id',
        'duedate',
        'amount',
        'fine_type',
        'fine_amount',
        'fine_percentage',
        'status',
    ];
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
    public function feesCollect(): HasOne
    {
        return $this->hasOne(FeesCollect::class);
    }
}
