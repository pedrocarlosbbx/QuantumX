<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Discussion;

class DiscussionComment extends Model
{
    use HasFactory;

    protected $table = 'discussion_comment';
    protected $fillable = ['user_id', 'discussion_id', 'text', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discussion()
    {
        return $this->belongsTo(Discussion::class);
    }
}
