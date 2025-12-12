<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $guarded = [];

    public function blogs(){//many to many  relation

     return $this->belongsToMany(Blog::class,'blog_category','category_id','blog_id');

    }
}
