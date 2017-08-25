@extends('layouts.layout')


@section('title')

<title>Login</title>

@endsection

@section('content')


    <div class="auth">
        <form action="/login" method="POST">

            
            <div class="form-group {{$errors->has('email') ? 'has-error': ''}}">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{Request::old('email') }}" >
                @if( $errors->has('email'))

                <span class="help-block">{{ $errors->first('email') }}
                </span>
                @endif

            </div>


            <div class="form-group {{$errors->has('password') ? 'has-error': ''}}">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Strong password" >
                @if( $errors->has('password'))
                <span class="help-block">{{ $errors->first('password')}}
                </span>
                @endif
            </div>

            @if(Session::has('message'))
                <div class="form-group">
                    {{Session::get('message')}}
                </div>
            @endif
            {{csrf_field()}}

            <button type="submit" class="btn btn-primary">Register</button>


        </form>
    </div>



@endsection
