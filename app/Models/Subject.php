<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'type',
        'version',
        'status'
];
public function standards()
 {
 return $this->belongsToMany(Standard::class);
 }
public function users()
 {
 return $this->belongsToMany(User::class);
 }
}

