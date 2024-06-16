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
    public $incrementing = false;
     protected $keyType = 'string';
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
    public function thumbnailPath(): string
    {
        $thumbnailPath = env('COURSE_FOLDER_PATH') . $this->thumbnail;
        if (!is_null($this->thumbnail) && file_exists(public_path($thumbnailPath))) {
            return asset($thumbnailPath);
        }
        return asset('client_assets/images/course/default_course_thumbnail.png');
    }

    public function studentsAmount(): int
    {
        return $this->students()->with('course')->where('status', 'paid')->count();
    }
}
