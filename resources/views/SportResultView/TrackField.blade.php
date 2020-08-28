
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link href="https://fonts.googleapis.com/css?family=Fira+Code|Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/style4.css">
    <title>Track&Field Result</title>

    <style>
        body{
            font-family: tahoma !important;
            }
        .display-7{
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            color:white;
        }
        .jumbotron{
            padding:0 45px;
            background-color:black;
        }
        .form-control{
            background: transparent;
            border: none;
            border-bottom:2px solid rgba(255,255,255,.2);
            height:45px;
            border-radius: 30px;
            background: #cccccc;
            color: #fff;

        }
        .form-control:focus,
        .form-control:hover{
            border:none;
            border-bottom: 2px solid rgba(255,255,255,1);
            box-shadow:none;
        }
        .card-header{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        .size1{
            width:150px;
            height:150px;
        }
        h4{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        h3{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }

        .table th{
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
            color:black;
        }
		.blog{
    position: relative;
    padding:100px 0;
	height:750px;
    background-image: linear-gradient(to top, #dbdcd7 0%, #dddcd7 24%, #e2c9cc 30%, #e7627d 46%, #b8235a 59%, #801357 71%, #3d1635 84%, #1c1a27 100%);
    background-size: cover;
}

        </style>

</head>
<body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).scroll(function(){
            $('.navbar').toggleClass('scrolled',$(this).
            scrollTop()>$('.navbar').height());
        });
    </script>

        @include('home.Navbar')


<section class="blog"><br><br>
<div class="x">
<h3 class="text-center">XIII SRI LANKA UNIVERSITY GAMES 2019</h3>
<h4 class="text-center">ATHLETICS CHAMPIONSHIP</h4>
    </div>
<div class="d-flex justify-content-center">
    <div class="form-inline" >
        <div class="col-md-4 my-3">
            <a class="btn btn-secondary btn-sm" href="/track1">Running Results</a>
        </div>
        <div class="col-md-4 my-3">
            <a class="btn btn-secondary btn-sm" href="/track2">Jumping Results</a>
        </div>
        <div class="col-md-4 my-3">
            <a class="btn btn-secondary btn-sm" href="/track3">Throwing Results</a>
        </div>
    </div>

    <div class="form-inline" >
        <div class="col-md-4 my-3">
            <a class="btn btn-secondary btn-sm" href="/RunningResults">All Running Results</a>
        </div>
        <div class="col-md-4 my-3">
            <a class="btn btn-secondary btn-sm" href="/JumpingResults">All Jumping Results</a>
        </div>
        <div class="col-md-4 my-3">
            <a class="btn btn-secondary btn-sm" href="/ThrowingResults">All Throwing Results</a>
        </div>
    </div>

</div>
<br>
<br><br>
  </section>
  </body>
@include('footer.footer')
  </html>
