<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    /**
     * @var false|mixed|resource|string|null
     */
    protected string $content;
    protected string $title;
    /**
     * @var int|mixed|string|null
     */
    protected mixed $user_id;
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
