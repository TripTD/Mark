@extends('layouts.master')

@section('head')
    Edditing/Insertion of Products
@endsection

@section('display-content')
    <form method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <strong>Title</strong> <input type="text" name="Title" value=""/><br/>
        <strong>Description</strong> <input type="text" name="Description" value=""/><br/>
        <strong>Price</strong> <input type="number" name="Price" value=""/><br/>
        <strong>Image</strong> <input type="file" name="img">
        <input type="submit" name="submit" value="Submit">
    </form>
@endsection
