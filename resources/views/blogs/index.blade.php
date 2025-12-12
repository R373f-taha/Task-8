@extends('layouts.app')
<style>
.btn-custom-pink {
    background-color: #ff69b4; /* زهري */
    color: white;
    border-radius: 30px; /* مدور */
    border: none;
    padding: 10px 25px;
    font-size: 18px;
    font-weight: 600;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
}

.btn-custom-pink:hover {
    transform: scale(1.15);
    box-shadow: 0 4px 12px rgba(255,105,180,0.6);
}
</style>
 <a href="{{route('addBlog')}}">
   <button type="button" class="btn btn-sm btn-custom-pink">
        +Add A New Blog
    </button>
    <a href="{{route('categories.index')}}">
   <button type="button" class="btn btn-sm btn-custom-pink">
        Categories
    </button>
    <a href="{{route('allSoftDelete')}}">
   <button type="button" class="btn btn-sm btn-custom-pink">
        All Soft Deleted Blogs
    </button>

    {{-- <form action="{{route('filterByCategoryID')}}" method='post'>
        enter the category number to filter by it:
        <input type='number' name='id'>
         <button type="submit"  class="btn btn-sm btn-custom-pink">ok --}}

</a><br><br> <div class="card-header d-flex justify-content-between align-items-center">

                    <a href="{{route('favList')}}">

                        <button type="button" class="btn btn-sm btn-custom-pink">My Favorite List</button>

                    </a>

                </div>
<br>

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">

            <div class="card">

                <div class="card-body p-3">
                    <table class="table table-bordered table-striped text-center align-middle mb-0" border="1">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Soft Delete</th>
                                <th>Force Delete</th>
                                <th>Add to Favorite</th>
                                <th>Choose the Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(@empty($blogs)){{__('No Data Yet')}}

                            @endempty
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td style="max-width: 200px; word-wrap: break-word;">{{ $blog->content }}</td>
                                <td>
                                    @if ($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 100px; height: auto;">
                                    @else
                                        No Image
                                    @endif
                                </td>

                                <td>

                         <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-custom-pink">Edit</a>

                                </td>
                                <td>
                                    <form action="{{route('softDelete',$blog)}}" method='post'>
                                        @method('delete')
                                        @csrf
                                       <br> <button type="submit" class="btn btn-sm btn-custom-pink">Soft Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{route('forceDelete',$blog->id)}}" method='post' class="m-0">
                                        @method('delete')
                                        @csrf
                                        <button type="submit"  class="btn btn-sm btn-custom-pink">Force Delete</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{route('add a favourite blog',$blog->id)}}" ><button type="button" class="btn btn-sm btn-custom-pink"> Add to Favourite</button></a>
                                </td>
                                <td style="text-align: left; vertical-align: middle;">
                                    <div style="max-height: 120px; overflow-y: auto; padding-right: 5px;">

        Select Categories
<form action="{{ route('addCategories', ['category_id' => '']) }}" method="post" id="categoryForm_{{ $blog->id }}">

            @csrf
            {{-- <input type="hidden" name="blog_id" value="{{ $blog->id }}"> --}}
            @foreach ($categories as $category)
                <div class="form-check">
                    <input type="checkbox" id="category_{{ $category->id }}" name="categories[]" value="{{ $category->id }}" class="form-check-input">
                    <label for="category_{{ $category->id }}">{{ $category->name }}</label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-sm btn-custom-pink">Choose</button>
        </form>
    </div>
                </td>

            </tr>
        @endforeach

</tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
