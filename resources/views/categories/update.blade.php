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
                    <form action="{{ route('categories.update',$category) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Title:</label>
                            <input type="text" name="name" class="form-control" value="{{$category->name}}">
                            @error('name')
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
