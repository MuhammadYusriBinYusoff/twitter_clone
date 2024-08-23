<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'userId',
        'ideaId',
    ];

    public function user(){
        return $this->belongsTo(User::class,'userId');  //better tulis nama column tuu
    }

    public function idea(){
        return $this->belongsTo(Idea::class,'ideaId');  //better tulis nama column tuu
    }
}
