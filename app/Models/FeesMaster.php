<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeesMaster extends Model
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
