@extends('layouts.master')

@section('head')
    Tech Shop Cart
@endsection

@section('display-content')
    <table>
        @if(count($items) != 0)
        <tr>
            <th>Product</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        @else
            <p>You have not selected items yet!</p>
        @endif
        @foreach($items as $item)
            <tr>
                <td> <img src={{ URL::asset("storage/Images/{$item->image}") }} style="width:150px"> </td>
                <td> {{ $item->title }}</td>
                <td> {{ $item->description }}</td>
                <td> {{ $item->price }}</td>
                <td><a href="{{route('Clients.removeFromCart',['id' => $item->id])}}">Remove item</a></td>
            </tr>
        @endforeach
    </table>
@endsection
@section('links')
    <a href="index">Go to Index!</a>
@endsection
@section('footer')
    @include('partials.send_order')
@endsection
