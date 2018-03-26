@extends('layouts.master')

@section('head')
    {{__('Edditing/Insertion of Products')}}
@endsection

@section('display-content')
    <form action="{{route('Products.editInsertProduct', ['id' => $id])}}"  method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <strong>{{__('Title')}}</strong> <input type="text" name="Title" value=""/><br/>
        <strong>{{__('Description')}}</strong> <input type="text" name="Description" value=""/><br/>
        <strong>{{__('Price')}}</strong> <input type="number" name="Price" value=""/><br/>
        <strong>{{__('Image')}}</strong> <input type="file" name="img">
        <input type="submit" name="submit" value="{{__('Submit')}}">
    </form>
@endsection
