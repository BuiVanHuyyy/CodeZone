<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, softDeletes;
    public $incrementing = false;
     protected $keyType = 'string';
    public function author(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function likes(): MorphMany
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function dislikes(): MorphMany
    {
        return $this->morphMany(Dislike::class, 'dislikeable');
    }
    public function reviewable(): MorphTo
    {
        return $this->morphTo();
    }
}
