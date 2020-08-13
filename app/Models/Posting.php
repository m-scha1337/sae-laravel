<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posting extends Model
{

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

}
