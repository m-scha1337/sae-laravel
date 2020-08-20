<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{

    protected $fillable = ['title','text'];


    // == Relations
    // https://laravel.com/docs/7.x/eloquent-relationships

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }



    // == Scopes
    // https://laravel.com/docs/7.x/eloquent#query-scopes

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopePopular($query)
    {
        return $query->where('like_count', '>', 100);
    }


    // == Attributes

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/images/' . $this->image_path) : null;
    }

}
