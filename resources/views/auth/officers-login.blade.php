@extends('layouts.app')
@section('content')
<div class="container-fluid bg">
    <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">

        <form method="POST" action="{{ route('officers.login.submit') }}" id="log">
            <h2 class="text-center" style="color:white;">OFFICERS LOGIN</h2>
            <img class="img img-responsive rounded-circle center" img src="https://media.giphy.com/media/pLgom5kv8PLnG/giphy.gif">
            <div class="form-group">
                <label>NIC ID</label>
                <input id="email" type="text" class="form-control" name="nic" value="{{ old('nic') }}" required autofocus>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input id="password" type="password" class="form-control" name="password" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
            </div>
            <button type="submit" class="btn btnD5">Login</button>
            {{csrf_field()}}
        </form>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">
    </div>
</div>
</div>
@endsection
