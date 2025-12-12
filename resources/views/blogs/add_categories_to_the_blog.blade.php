
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Blog') }}</div>

                <div class="card-body">
                    <form action="{{route('add_categories_to_blog',$blog->id)}}" method='post'>
                            @method('delete')
                            @csrf
                            <div class="mb-3">
                            <input type='submit' value='forceDelete'>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

