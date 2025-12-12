<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
class Blog extends Model
{
    protected $guarded = [];

    protected $dates=['deleted at'];

  use SoftDeletes;//for the sot delete operation

    public function categories(){// many to many relation

     return $this->belongsToMany(Category::class,'blog_category','category_id','blog_id');

    }

     public function users(){//each user has many favourite blogs

    return $this->belongsToMany(User::class,'favorite','user_id','favourite_blogs_id');
    
   }
}
