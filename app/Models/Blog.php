<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    public function author(): BelongsTo
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
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
