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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>user_id</th>
                                <th>blog_id</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $d)
                            <tr>
                                <td>{{ $d->pivot->user_id }}</td>
                                <td>{{ $d->pivot->favorite_blogs_id }}</td>

                                <td><a href="{{route('remove', $d->pivot->favorite_blogs_id )}}"><button class="btn btn-sm btn-custom-pink">remove from favorite list</button></a>
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


