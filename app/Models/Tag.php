<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'tag_name',
    ];

    // Jika terdapat relasi many-to-many dengan tabel articles
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
