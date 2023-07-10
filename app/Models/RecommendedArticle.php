<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecommendedArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'curated_article_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curatedArticle()
    {
        return $this->belongsTo(CuratedArticle::class);
    }
}
