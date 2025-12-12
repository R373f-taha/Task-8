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
 <a href="{{route('categories.create')}}">
   <button type="button" class="btn btn-sm btn-custom-pink">
        +Add A New Category
    </button>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                    <table class="table table-bordered" border=1>
                        <thead>
                                <th>id</th>
                                <th>Name</th>
                                <th>edit</th>


                        </thead>
                        <tbody>
                            {{-- if(@empty($categories)) No Data Yet --}}
                            @foreach ($categories as $category)
                            <tr>
                                 <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                   <td>
                                    <a href="{{route('categories.edit',$category)}}"><button class="btn btn-sm btn-custom-pink">Edit</button></a>

                                </td>
                                 <td>
                                  <form action="{{route('categories.destroy',$category)}}" method='post'>
                                        @method('delete')
                                        @csrf
                                       <br> <button type="submit" class="btn btn-sm btn-custom-pink">Delete</button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection


