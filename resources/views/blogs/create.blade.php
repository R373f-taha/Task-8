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
                <div class="card-header">{{ __('Create Blog') }}</div>

                <div class="card-body">

                    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" required>
                            @error('title')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Content:</label>
                            <textarea name="content" class="form-control" required></textarea>
                               @error('content')
                            {{$message}}
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image:</label>
                            <input type="file" name="image" class="form-control" required>
                               @error('image')
                            {{$message}}
                            @enderror
                        </div>
                         {{ __('**accepted image with png,jpg,gif,jpeg,jfif extentions and for the size must be 2048') }}
                        <br><br><button type="submit" class="btn btn-sm btn-custom-pink" >Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

