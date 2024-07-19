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
    private array $badgeColor = [
        'pending' => 'badge-warning',
        'active' => 'badge-success',
        'suspended' => 'badge-danger'
    ];

    private array $statusName = [
        'pending' => 'Chờ phê duyệt',
        'active' => 'Xác thực',
        'suspended' => 'Khóa',
    ];

    public function getBadgeColor(): string
    {
        return $this->badgeColor[$this->user->status] ?? '';
    }

    public function getStatusName(): string
    {
        return $this->statusName[$this->user->status] ?? '';
    }

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
        foreach ($this->courses->where('status', 'approved') as $course) {
            $studentsAmount += $course->studentsAmount();

        }
        return $studentsAmount;
    }

    public function totalIncome(): int
    {
        $totalIncome = 0;
        foreach ($this->courses->where('status', 'approved') as $course) {
            $totalIncome += $course->totalTuition();
        }
        return $totalIncome;
    }

    public function checkInstructorIsAuthor(string $course_id): bool
    {
        return $this->courses->contains('id', $course_id);
    }

    public function deleteCV(): void
    {
        if ($this->cv_upload) {
            $cv_path = env('CV_FOLDER_PATH') . $this->cv_upload;
            if (file_exists(public_path($cv_path))) {
                unlink(public_path($cv_path));
                $this->cv_upload = null;
            }
        }
    }

}
