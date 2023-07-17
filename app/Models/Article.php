<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'article_title',
        'text',
        'foto_article',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Jika terdapat relasi many-to-many dengan tabel categories
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // Jika terdapat relasi one-to-many dengan tabel comments
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
