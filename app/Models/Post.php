<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    // public function getSnippetAttribute(){
    //     return explode("\n\n", $this->body)[0];
    // }

    public function snippet(): Attribute {
        return Attribute::get(fn () => explode("\n\n", $this->body)[0]);
    }

    public function displayBody(): Attribute {
        return Attribute::get(fn () => nl2br($this->body));
    }

    public function displayImage(): Attribute {
        return Attribute::get(function () {
            if($this->image === null || parse_url($this->image, PHP_URL_SCHEME)){
                return $this->image;
            }
            return Storage::disk('public')->url($this->image);
        });
    }

    public function authHasLiked(): Attribute {
        return Attribute::get(function (){
            if(!auth()->check()){
                return false;
            }
            return $this->likes()->where('user_id', auth()->user()->id)->exists();
        });
    }

    
    public function user(){
        return $this->belongsTo(User::class)->withDefault();  
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    protected static function booted(): void
    {
        static::deleting(function (Post $post) {
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                
                Storage::disk('public')->delete($post->image);
            }
        });
    }
    
}
