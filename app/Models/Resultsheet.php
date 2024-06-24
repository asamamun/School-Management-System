<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Resultsheet extends Model
{
    use HasFactory;
    protected $fillable = [
        'session',
        'exam_id',
        'standard_id',
        'student_id',
        'total',
        'avg',
        'classavg',
        'pos',
        'af',
        'ps',
        'p_comment',
        't_comment',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function exam(): BelongsTo
    {
        return $this->belongsTo(Exam::class);
    }

    public function standard(): BelongsTo
    {
        return $this->belongsTo(Standard::class);
    }
}
