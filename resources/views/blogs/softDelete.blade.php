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
</a><br><br> <div class="card-header d-flex justify-content-between align-items-center">
                    {{ __('Create Blog') }}
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
                                <th>Restore</th>

                            </tr>
                        </thead>
                        <tbody>
                            {{-- @if(@empty($blogs){{No Data Yet}} --}}
{{--
                            @endempty --}}
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
                                    <a href="{{route('restoreBlog',$blog->id)}}"><button class="btn btn-sm btn-custom-pink">Restore</button></a>

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
