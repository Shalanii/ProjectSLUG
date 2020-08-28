<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/login.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js" type="text/javascript"></script>

<div class="container-fluid bg">
    <div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">

        <form method="POST" action="{{ route('officers.login.submit') }}" id="log">
            <h1>LOGIN FORM</h1>
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
</body>
</html>