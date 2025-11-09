@extends('layout.main')
@section('content')
    <form action="{{route('product.update',[$product->id])}}" method="post"  enctype="multipart/form-data">
        @csrf

        <x-form.input name="logo" type="file" class="file center-block" category="{{$product->logo}}"></x-form.input>


        <x-form.input name="name" type="text" :value="$product->name"></x-form.input>
        <x-form.input name="tag" type="text" :value="$tags"></x-form.input>

        <x-form.input name="price" type="number" :value="$product->name"></x-form.input>
        <x-form.input name="compare_price" type="number" :value="$product->name"></x-form.input>
        <x-form.input name="rating" type="number" :value="$product->name"></x-form.input>



        <x-form.input name="description" :value="$product->description" type="text"></x-form.input>
        <x-form.select2 name="category_id" label="category" :slected="$product->category->name" :options="$categories"></x-form.select2>

        <x-form.select2 name="store_id" label="store" :slected="$product->store->name" :options="$stores"></x-form.select2>

        <x-form.checkbox value="active" :category="$product->status" name="status" label="active"></x-form.checkbox>
        <x-form.checkbox value="archived" name="status"  :category="$product->status"  label="archived"></x-form.checkbox>
        <x-form.checkbox value="draft" name="status"  :category="$product->status"  label="draft"></x-form.checkbox>

        <button type="submit"> update</button>
    </form>

    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
        <script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
        <script>var inputElm = document.querySelector('[name=tag]'),
                tagify = new Tagify (inputElm);</script>
    @endpush
@endsection
