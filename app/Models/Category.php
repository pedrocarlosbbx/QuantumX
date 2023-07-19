<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    // Jika terdapat relasi many-to-many dengan tabel articles
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
