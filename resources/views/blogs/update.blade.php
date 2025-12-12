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
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Blog') }}</div>

                <div class="card-body">
                    <form action="{{ route('blogs.update',$blog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" value="{{$blog->title}}">
                               @error('title')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" class="form-control" >{{$blog->content}}</textarea>
                               @error('content')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" class="form-control">
                               @error('image')
                            {{$message}}
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-custom-pink">Update </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

