@extends('layouts.app')

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
                                <th>Title</th>
                                <th>Content</th>
                                <th>Image</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->content }}</td>
                                <td>
                                 @if ($blog->image)
                                        <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}" style="width: 100px; height: auto;">
                                    @else
                                        No Image
                                    @endif

                                </td>

                            <td><a href="{{route('blogs.edit',$blog)}}">Edit</a></td>
                        <td><form action="{{route('softDelete',$blog)}}" method='post'>
                            @method('delete')
                            @csrf
                            <input type='submit' value='softDelete'>
                        </form></td>
                         <td><form action="{{route('forceDelete',$blog->id)}}" method='post'>
                            @method('delete')
                            @csrf
                            <input type='submit' value='forceDelete'>
                        </form></td>
                        <td><a href="{{route('add a favourite blog',$blog->id)}}">add a favourite blog</a></td>
                         <td>{{$blog->name}}</td>
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
