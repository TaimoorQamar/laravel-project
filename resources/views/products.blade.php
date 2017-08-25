@extends('layouts.layout')

@section('title')
    <title>Index page</title>

    @endsection

@section('content')


<section class="row post">
      <div class="col-md-6 col-md-offset-3">
          <header><h3>product table</h3></header>


          <table border="1">
              @foreach($products as $product)
  <tr>
    <th>{{$product->productname}}</th>
    <th>{{$product->productprice}}</th>
    <th><a href="/delete/product/{{$product ->id}}">Delete</th>


  </tr>

@endforeach

</table>

@endsection
