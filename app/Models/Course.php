<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['status'];
    public function students(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'course_id');
    }
    public function author(): BelongsTo
    {
        return $this->belongsTo(Instructor::class, 'instructor_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'course_id');
    }
    public function reviews(): MorphMany
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
}
