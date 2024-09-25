@extends('layout.main')
@section('content')
<x-alert></x-alert>
<form method="get" >
    <input name="search" value="{{$request->get('search')}}">
    <select name="status">
        <option value="">
            all
        </option>
        <option value="active">
active
        </option>
        <option value="archived">
archived
        </option>
    </select>
    <button type="submit">search</button>
</form  >
    <table class="mb-md-5" >
        <thead>
        <tr>
            <th>image</th>
            <th>id</th>
            <th>name</th>
            <th>parent</th>
            <th>status</th>
            <th>product</th>
            <th>created at</th>
            <th></th>
            <th></th>


        </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
        <tr>
            <td><img width="200" height="200" src="{{asset($category->logo)}}"></td>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->category->name??''}}</td>
            <td>{{$category->status}}</td>

            <td>{{$category->product_count}}</td>
            <td>{{$category->created_at}}</td>
            <td>
                <a href="{{route('categories.edit',[$category->id])}} " class="btn btn-sm btn-outline-success">edit</a>
            </td>
            <td>
<form method="post" action="{{route('categories.destroy',[$category->id])}}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-sm btn-outline-success"> delete</button>

</form>

            </td>

        </tr>
        @empty

        <tr>
                    <td colspan="7"> no categories found</td>
           </tr>

           @endforelse

        </tbody>
    </table>
          {{$categories->withQueryString()->links()}}
{{--{{$categories->withQueryString()->links(view custom for pagination put here or serviceprovidor)}}--}}


    <br>
    <div >
        <a href="{{route('categories.create')}}" class="btn btn-sm btn-outline-primary">create</a>
    </div>
@endsection
