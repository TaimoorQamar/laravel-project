@extends('layouts.layout')

@section('title')
    <title>Index page</title>

    @endsection

@section('content')

    <div class="container">
        <br />
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product['id']}}</td>
                    <td>{{$product['name']}}</td>
                    <td>{{$product['price']}}</td>
                    <td><a href="{{action('ProductController@Add', $product['id'])}}" class="btn btn-success">Add to cart</a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>





    @endsection
