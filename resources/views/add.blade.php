@extends('layouts.layout')

@section('title')
    <title>Add to  cart</title>

@endsection

@section('content')


    <form action={{"add-product"}}>
    <div class="container">

        <h1>Shopping Cart</h1><hr>
        <table class="table table-striped table-hover table-bordered">
            <tbody>


            <tr>
                <th>Item</th>
                <th>QTY</th>



            </tr>
            <tr>


            @foreach(session('items') as $i)
                <tr>

                    <td>{{$i['name']}}</td>
                    <td>{{$i['price']}}</td>
                </tr>
                @endforeach

            </tr>

            <tr>
                <th colspan="2"><span class="pull-right">Sub Total  {{$i['price']}} </span></th>
                <th></th>
            </tr>

            <tr>
                <th colspan="2"><span class="pull-right">Total   {{$i['price']}}</span></th>
                <th></th>
            </tr>
            <tr>
                <td><a href="#" class="btn btn-primary">Continue Shopping</a></td>
                <td colspan="2"><a href="#" class="pull-right btn btn-success">Checkout</a></td>
            </tr>
                {{--<td class="col-sm-1 col-md-1">--}}
                    {{--<a href="/removeItem/{{$i->id}}"> <button type="button" class="btn btn-danger">--}}
                            {{--<span class="fa fa-remove"></span> Remove--}}
                        {{--</button>--}}
                    {{--</a>--}}
                {{--</td>--}}
            </tbody>
        </table>

    </div>
    </form>


@endsection