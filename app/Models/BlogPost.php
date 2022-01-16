<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BlogPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function reviews()
    {
        return $this->hasMany(Review::class,'post_id')->orderBy('created_at', 'desc');
    }

    public function addReview($body, $userid)
    {
        $this->reviews()->create(['body' => $body, 'user_id' => $userid]);
    }
}
