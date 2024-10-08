<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function blogposts()
    {
        return $this->belongsToMany(BlogPost::class, 'blogpost_tag', 'blog_post_id', 'category_id');
    }
}
