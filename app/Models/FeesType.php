<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class FeesType extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'description',
        'status',
    ];
    public function feesMaster(): HasOne
    {
        return $this->hasOne(FeesMaster::class);
    }
}
