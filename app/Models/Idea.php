<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'userId'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');  //better tulis nama column tuu
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ideaId');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'ideaId');
    }

    public function isLikedBy(User $user) {
        return $this->likes()->where('userId', $user->id)->exists();
    }

}
