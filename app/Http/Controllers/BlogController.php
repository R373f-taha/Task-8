<?php

namespace App\Http\Controllers;

use App\Http\Requests\blogRequeswtStore;
use App\Http\Requests\blogRequeswtUpdate;
use App\Models\Blog;
use App\Models\User;
use App\Models\Category;
use App\Models\Category\favo;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isEmpty;

class BlogController extends Controller
{


    public function index()

    {//for display all blogs

        $blogs=Blog::with('categories:id,name')->get();

         $categories=Category::all();


        return view('blogs.index',compact('blogs','categories'));//send the blogs th the show page

    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {

        return view('blogs.create');// add a new blog

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(blogRequeswtStore $request)
    {
        $imagePath=null;

        $blog=$request->validated();


        if($request->hasFile('image')){//it user sends a photo

            $photoPath=$request->file('image')->store('images','public');//store image in the storage directory

            $blog['image']=$photoPath;//store the image path in the DB

        }


      Blog::create($blog);//create the new blog

     return redirect()->route('blogs.index')->with('success!');//redirect to the show page

    }

    /**
     * Display the specified resource.
     */

    public function show(Blog $blog)
    {
          $blogs=Blog::with('categories:id,name')->get();//return only one

        return view('blogs.blog_details',compact('blogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Blog $blog)//update form
    {
        return view('blogs.update',compact('blog'));
    }

    /**
     * Update the specified resource in storage.

     */

    public function update(blogRequeswtUpdate $request, Blog $blog)
    {//dd($request->validated());
        $newBlog=$request->validated();//validation

      if($request->hasFile('image')){//if the user wants to update the image

      if($blog->image){

        Storage::disk('public')->delete($blog->image);//delete the old image from the storage directory

      }
        $photoPath=$request->file('image')->store('images','public');//store the new image

            $blog->image=$photoPath;
        }

            $blog->update(
                array_filter( // get rid of the null values
                [

                  'title'=>$newBlog['title']??$blog->title,

                  'content'=>$newBlog['content']??$blog->content,

                  'image'=>$blog->image

                ]
                )

         );

            return redirect()->route('blogs.index')->with('success!');

            }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {

     $blog->delete();

     return redirect()->route('blogs.index');


    }

     public function softDelete(Blog $blog)//softDelete
    {
    $blog->delete();

    return redirect()->route('blogs.index')->with('success delete');
    }

public function restoreBlog($id){//restore the blog

$blog=Blog::withTrashed()->find($id);//find the blog`s id

 $blog->restore();//restore it

   return redirect()->route('blogs.index')->with('success restore');
}

public function allSoftDeleteRecords(){//only soft deleted blogs


    $blogs=Blog::onlyTrashed()->get();


    return view('blogs.softDelete',compact('blogs'));

}
    public function ForceDelete($id)//delete it
    {
   $blog=Blog::withTrashed()->find($id);//find the blog`s id

   if($blog){

    $blog->forceDelete();//delete it

    return redirect()->route('blogs.index')->with('success force deleting');

}

    else return redirect()->route('blogs.index')->with('failed force deleting');//if the blog doesn`t exists

    }

    public function add_categories($blog,$category_id){//to add categories for any blog

        $categories=Category::all();

    return view('blogs.index',compact('categories'));

    }


    public function addToFavorite($blog_id){//add any blog to a favorite list

    $blog=Blog::findOrFail($blog_id);

     Auth::user()->favorite_blogs()->syncWithoutDetaching($blog_id);//connecting the user with his favorite blogs

   return  redirect()->route('blogs.index');

    }
    public function favList(){//return the favorite list of the blogs for the current user

        $data=Auth::user()->favorite_blogs()->get();


       return view('blogs.favorite_blogs',compact('data'));

    }

    public function removeFromFav($blog_id){//remove  blog in the fav list to be a normal blog => not favorite blog

    $blog=Blog::findOrFail($blog_id);

     Auth::user()->favorite_blogs()->detach($blog_id);

  return  redirect()->route('blogs.index');
  }


  public function filterByCategoryID($category_id){

      $blogs=Blog::where('category_id',$category_id)->get();
        return view('blogs.index',compact('blogs'));
  }

}
