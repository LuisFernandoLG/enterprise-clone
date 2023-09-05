<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'url_image',
        'author_id',
        'likes'
    ];

    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getComments()
    {
        return $this->hasMany(Commnet::class, 'post_id', 'id');
    }
}
