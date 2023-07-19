<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use App\Models\Tag;

class ArticleTag extends Model
{
    use HasFactory;

    protected $table = 'article_tag';
    protected $fillable = ['article_id', 'tag_id'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
