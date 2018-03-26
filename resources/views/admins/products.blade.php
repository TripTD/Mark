@extends('layouts.master')

@section('head')
    {{_('Web Tech Shop Products')}}
@endsection

@section('display-content')
    <table>
        <tr>
            <th>{{__('Product')}}</th>
            <th>{{__('Title')}}</th>
            <th>{{__('Description')}}</th>
            <th>{{__('Price')}}</th>
        </tr>
        @foreach($items as $item)
            <tr>
                <td> <img src={{ URL::asset("storage/Images/{$item->image}") }} style="width:150px"> </td>
                <td> {{ $item->title }}</td>
                <td> {{ $item->description }}</td>
                <td> {{ $item->price }}</td>
                <td><a href="{{route('Admins.editInsertProduct',['id' => $item->id])}}">{{__('Edit item')}}</a></td>
                <td><a href="{{route('Products.removeProduct', ['id' => $item->id])}}">{{__('Remove item')}}</a></td>
            </tr>
        @endforeach
    </table>
    <br>
    <a href="{{route('Admins.editInsertProduct', ['id' => 0])}}">{{__('Add Item')}}</a>
@endsection
@section('footer')
    @include('partials.logout_div')
@endsection