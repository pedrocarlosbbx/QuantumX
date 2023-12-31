<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class CuratedArticle extends Model
{
    use HasFactory;

    protected $table = 'curated_article';
    protected $fillable = ['article_id','status'];

    public function article()
    {
        return $this->belongsTo(Article::class);
    }
}
