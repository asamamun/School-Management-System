<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Standard extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'session',
        'shift_id',
        'section_id',
        'version',
        'status'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
    }
    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class);
    }
    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }
    public function feesAssigns(): HasMany
    {
        return $this->hasMany(FeesAssign::class);
    }
    public function marks(): HasMany
    {
        return $this->hasMany(Mark::class);
    }
    public function resultsheets(): HasMany
    {
        return $this->hasMany(Resultsheet::class);
    }
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
