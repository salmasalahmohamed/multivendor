@extends('layout.main')
@section('content')
    <form action="{{route('categories.update',[$category->id])}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-form.input name="logo" type="file" class="file center-block" category="{{$category->logo}}"></x-form.input>


        <x-form.input name="name" type="text" :value="$category->name"></x-form.input>

        <x-select></x-select>



        <x-form.input name="description" :value="$category->description" type="text"></x-form.input>


        <x-form.checkbox value="active" :category="$category->status" name="status" label="active"></x-form.checkbox>
        <x-form.checkbox value="archived" name="status"  :category="$category->status"  label="archived"></x-form.checkbox>

        <button type="submit"> update</button>
    </form>
@endsection
