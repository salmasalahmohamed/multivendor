@extends('layout.main')
@section('content')
    <x-alert></x-alert>
    <form method="get" >
        <input name="search" value="{{\Illuminate\Support\Facades\Request::get('search')}}">
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
            <th>category</th>
            <th>store</th>

            <th>status</th>
            <th>price</th>
            <th>compare</th>
            <th>rating</th>

            <th>created at</th>
            <th></th>
            <th></th>


        </tr>
        </thead>
        <tbody>
        @forelse($products as $product)
            <tr>
                <td><img width="200" height="200" src="{{asset($product->logo)}}"></td>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name??''}}</td>
                <td>{{$product->store->name??''}}</td>

                <td>{{$product->status}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->compare_price}}</td>
                <td>{{$product->rating}}</td>


                <td>{{$product->created_at}}</td>
                <td>
                    <a href="{{route('product.edit',[$product->id])}} " class="btn btn-sm btn-outline-success">edit</a>
                </td>
{{--                <td>--}}
{{--                    <form method="post" action="{{route('categories.destroy',[$category->id])}}">--}}
{{--                        @csrf--}}
{{--                        @method('delete')--}}
{{--                        <button type="submit" class="btn btn-sm btn-outline-success"> delete</button>--}}

{{--                    </form>--}}

{{--                </td>--}}

            </tr>
        @empty

            <tr>
                <td colspan="7"> no categories found</td>
            </tr>

        @endforelse

        </tbody>
    </table>
    {{$products->withQueryString()->links()}}
    {{--{{$categories->withQueryString()->links(view custom for pagination put here or serviceprovidor)}}--}}


    <br>

@endsection
