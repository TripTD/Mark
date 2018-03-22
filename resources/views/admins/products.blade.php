@extends('layouts.master')

@section('head')
    Web Tech Shop Products
@endsection

@section('display-content')
    <table>
        <tr>
            <th>Product</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td> <img src={{ URL::asset("storage/Images/{$item->image}") }} style="width:150px"> </td>
                <td> {{ $item->title }}</td>
                <td> {{ $item->description }}</td>
                <td> {{ $item->price }}</td>
                <td><a href="{{route('Admins.editProduct',['id' => $item->id])}}">Edit item</a></td>
                <td><a href="{{route('Products.removeProduct', ['id' => $item->id])}}">Remove item</a></td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{route('Admins.insertProduct')}}">Add Item</a>
@endsection
@section('footer')
    @include('partials.logout_div')
@endsection