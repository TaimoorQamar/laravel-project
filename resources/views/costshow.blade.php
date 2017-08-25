@extends('layouts.layout')

@section('title')
    <title>Cost page</title>

    @endsection

@section('content')
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <div class="auth">
          <form action="" method="POST">
            <section class="row post">
                  <div class="col-md-6 col-md-offset-3">
                      <header><h3>cost table</h3></header>


                      <table border="1">
                          @foreach($costshow as $cost)
              <tr>
                <th>{{$cost->name}}</th>
                <th>{{$cost->productname}}</th>
                <th>{{$cost->productcost}}</th>
                <th>  <a href="/delete/cost/{{$cost ->id}}">Delete</a></th>


              </tr>

            @endforeach

            </table>
          </form>

            @endsection
