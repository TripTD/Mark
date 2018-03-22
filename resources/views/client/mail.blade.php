@extends('layouts.master')

@section('head')
    Ordered products
@endsection

@section('display-content')


    <p>Products list desired by coustomer: {{ $name }}</p>
    <p>E-mail adress of the coustomer: {{ $from }}  </p>

    <table>
        <tr>
            <th>Product</th>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td><img src="{{ $url }}/{{ $item->image }}" style="width:150px"></td>
                <td>|Product: {{ $item->title }}</td>
                <td>|Description: {{ $item->description }}</td>
                <td>|Price: {{  $item->price }}</td>
            </tr>
        @endforeach
    </table>
    <p>Additional information from the client: {{ $comments }} </p>
@endsection


