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

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->title = ''; // Inicializando com uma string vazia
        $this->content = ''; // Inicializando com uma string vazia
        $this->user_id = null; // Inicializando como nulo
    }


}
