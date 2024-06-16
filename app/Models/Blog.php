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
    public $incrementing = false;
     protected $keyType = 'string';
    public function author(): BelongsTo
    {
       return $this->belongsTo(Instructor::class, 'instructor_id');
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
    public function thumbnailPath(): string
    {
        $thumbnailPath = env('BLOG_FOLDER_PATH') . $this->thumbnail;
        if (!is_null($this->thumbnail) && file_exists(public_path($thumbnailPath))) {
            return asset($thumbnailPath);
        }
        return asset('client_assets/images/blog/default_blog_thumbnail.png');
    }
}
