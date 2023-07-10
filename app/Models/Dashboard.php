<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    use HasFactory;

    protected $table = 'dashboards';
    protected $fillable = ['user_id', 'recommended_article_id', 'discussion_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function recommendedArticle()
    {
        return $this->belongsTo(RecommendedArticle::class);
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}
