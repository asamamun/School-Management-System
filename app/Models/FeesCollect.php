<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeesCollect extends Model
{
    use HasFactory;
    protected $fillable = [
       'fees_assign_id',
       'payment_type',
       'trxid',
       'amount',
       'date',
       'note',
    ];
    public function feesAssign(): BelongsTo
    {
        return $this->belongsTo(FeesAssign::class);
    }
}
