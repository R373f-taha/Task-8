<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     public function addFavouriteBlogs($blog_id){
         $user=User::findOrFail(Auth::user()->id);
         $blog=Blog::findOrFail($blog_id);
         $user->favourite_blogs()->attach($blog_id);
    }
    // public function getFavouriteBlogs(){
    //     return
    // }

    public function addBlog($user_id){
        
    }
}
