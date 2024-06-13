<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeesGroup extends Model
{
    use HasFactory;
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
    ];
    
    
    /**
     * Get the fees masters for the fees group.
     */
    
    public function feesMasters(): HasMany
    {
        return $this->hasMany(FeesMaster::class);
    }
}
