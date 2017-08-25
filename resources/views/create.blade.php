@extends('layouts.layout')

@section('title')
    <title>Create product</title>

    @endsection

@section('content')


          <form action="{{url('products')}}" method="POST">

              <div class="container">
                  <h2>Create A Product</h2><br  />
                  @if ($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div><br />
                  @endif
                  @if (\Session::has('success'))
                      <div class="alert alert-success">
                          <p>{{ \Session::get('success') }}</p>
                      </div><br />
                  @endif
                  <form method="post">
                      <div class="row">
                          <div class="col-md-4"></div>
                          <div class="form-group col-md-4">
                              <label for="name">Name:</label>
                              <input type="text" class="form-control" name="name">
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-4"></div>
                          <div class="form-group col-md-4">
                              <label for="price">Price:</label>
                              <input type="text" class="form-control" name="price">
                          </div>
                      </div>

              <div class="row">
                  <div class="col-md-4"></div>
                  <div class="form-group col-md-4">
                      {{csrf_field()}}
                      <button type="submit" class="btn btn-success" style="margin-left:38px">Add Product</button>

                  </div>
              </div>
          </form>
      </div>


          </form>


    @endsection
