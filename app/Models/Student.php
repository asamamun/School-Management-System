<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'admission_no',
        'roll_no',
        'first_name',
        'last_name',
        'mobile',
        'email',
        'user_id',
        'standard_id',
        'section_id',
        'shift_id',
        'dob',
        'religion',
        'gender',
        'blood_group',
        'admission_date',
        'image',
        'guardian_name',
        'guardian_mobile',
        'address',
        'nationality',
        'birth_certificate',
        'status',
    ];

    public function enrollment(): HasOne
    {
        return $this->hasOne(Enrollment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    // Define relationships
    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function shift(): BelongsTo
    {
        return $this->belongsTo(Shift::class);
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
}
