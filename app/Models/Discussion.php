<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;

    protected $table = 'discussions';
    protected $fillable = ['user_id', 'tag_id', 'title', 'text', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function comments()
    {
        return $this->hasMany(DiscussionComment::class);
    }
}
