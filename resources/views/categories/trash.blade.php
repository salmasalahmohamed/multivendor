@extends('layout.main')
@section('content')
    <x-alert></x-alert>
    <form method="get" >
        <input name="search" value="{{\Illuminate\Support\Facades\Request::get('search')??""}}">
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
    <table  >
        <thead>
        <tr>
            <th>image</th>
            <th>id</th>
            <th>name</th>
            <th>parent</th>
            <th>status</th>

            <th>created at</th>
            <th></th>
            <th></th>


        </tr>
        </thead>
        <tbody>
        @forelse($categories as $category)
            <tr>
                <td><img width="200" height="200" src="{{asset('storage/'.$category->logo)}}"></td>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->category->name??''}}</td>
                <td>{{$category->status}}</td>

                <td>{{$category->created_at}}</td>
                <td>

                    <form method="post" action="{{route('category.restore',[$category->id])}}">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-sm btn-outline-success"> restore</button>

                    </form>                </td>
                <td>
                  <form method="post" action="{{route('category.forcedelete',[$category->id])}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-outline-success">  force delete</button>

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
