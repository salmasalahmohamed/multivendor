@extends('layout.main')
@section('content')
    <form action="{{route('store.insert')}}" method="post"  enctype="multipart/form-data">
        @csrf

        <x-form.input name="logo" type="file" class="file center-block"></x-form.input>
        <x-form.input name="name" type="text"></x-form.input>


        <x-form.input name="description" type="text"></x-form.input>


        <x-form.checkbox value="active" name="status" label="active"></x-form.checkbox>


        <button type="submit"> create</button>
    </form>
@stop
