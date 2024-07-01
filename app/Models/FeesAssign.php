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
        'fees_master_id',
        'student_id',
        'standard_id',
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
        return $this->hasOne(FeesCollect::class)->withTrashed();
    }

    public function feesGroups(): HasManyThrough
    {
        return $this->hasManyThrough(FeesGroup::class, FeesMaster::class);
    }
    public function feesTypes(): HasManyThrough
    {
        return $this->hasManyThrough(FeesType::class, FeesMaster::class);
    }
}
