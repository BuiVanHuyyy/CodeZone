<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false;
     protected $keyType = 'string';
    public $guarded = [];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }
    public function blogs(): HasMany
    {
        return $this->hasMany(Blog::class, 'instructor_id');
    }
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    public function studentsAmount(): int
    {
        $studentsAmount = 0;
        foreach ($this->courses()->with('students') as $course) {
            $studentsAmount += $course->studentsAmount();

        }
        return $studentsAmount;
    }
    public function checkInstructorIsAuthor(string $course_id): bool
    {
        return $this->courses->contains('id', $course_id);
    }
}
