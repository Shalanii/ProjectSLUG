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
    <link rel="stylesheet" href="/css/sportsresult.css">


    <title>Taekwondo Result</title>

    <style>

	           .table th{
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
        }
        .table td{
            background-color:#fffff0;
        }

        body{
            font-family: tahoma !important;
            }

        hr{
            color:white;
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

        .my-8{
            background-color:white;
        }
        .table th{
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
            color:black;
        }
        h4{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        h3{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        p{
             position:relative;
            top:30px;
            color:800000;   
		font-size:14px;     }


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
    <h3 class="text-center" style="color:white;">XIII SRI LANKA UNIVERSITY GAMES 2019</h3>
    <h4 class="text-center" style="color:white;">Taekwondo - Sparing</h4>
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <div class="table-responsive">
                        <h4 style="color:white;"><center>Taekwondo Sparing - Men's Results</center></h4>
                        <hr class='my-8'>
                        <table class="table table-bordered table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Weight Category</th>
                                <th>Name</th>
                                <th>University</th>
                            </tr>
                            @foreach($r as $s)
                                <tr>
                                    <td><p style="font-weight:bold;">{{$s->Rank}}</p></td>
                                    <td><p>{{$s->WeightCategory}}</p></td>
                                    <td><p>{{$s->Name}}</p></td>
                                    <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <div class="table-responsive">
                        <h4 style="color:white;"><center>Taekwondo Sparing - Women's Results</center></h4>
                        <hr class='my-8'>
                        <table class="table table-bordered table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Weight Category</th>
                                <th>Name</th>
                                <th>University</th>
                            </tr>
                            @foreach($rr as $s)
                                <tr>
                                    <td><p style="font-weight:bold;">{{$s->Rank}}</p></td>
                                    <td><p>{{$s->WeightCategory}}</p></td>
                                    <td><p>{{$s->Name}}</p></td>
                                    <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
</body>
</html>
