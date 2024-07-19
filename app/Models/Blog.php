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
    protected $guarded = [];
    private array $badgeColor = [
        'pending' => 'badge-warning',
        'approved' => 'badge-success',
        'suspended' => 'badge-danger',
    ];
    private array $statusName = [
        'pending' => 'Chờ phê duyệt',
        'approved' => 'Đã phê duyệt',
        'suspended' => 'Khóa'
    ];
    public function getBadgeColor(): string
    {
        return $this->badgeColor[$this->status];
    }
    public function getStatusName(): string
    {
        return $this->statusName[$this->status];
    }
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
        if (!is_null($this->thumbnail)) {
            if (file_exists(public_path(env('BLOG_FOLDER_PATH') . $this->thumbnail))) {
                return asset(env('BLOG_FOLDER_PATH') . $this->thumbnail);
            }elseif (file_exists(public_path(env('TMP_FOLDER_PATH') . $this->thumbnail))) {
                return asset(env('TMP_FOLDER_PATH') . $this->thumbnail);
            }
        }
        return asset('client_assets/images/blog/default_blog_thumbnail.png');
    }
}
