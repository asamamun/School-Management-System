<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attendance extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'student_id',
        'standard_id',
        'attendance_date',
        'status',
        'remarks',
    ];
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }
}
