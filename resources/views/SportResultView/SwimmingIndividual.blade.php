
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


    <title>Swimming - Individual Results</title>

    <style>
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
            color:white;
            text-align:center;
        }
	  	.table td{
		background-color:#fffff0;
		
	}
		.table td p{
		
		color:#800000;
		font-size:13px;
	}

	.slash {
  position: relative;
  z-index: 0; }
  .slash:after {
    content: '';
    -ms-transform: skewX(-40deg);
    transform: skewX(-40deg);
    -webkit-transform: skewX(-40deg);
    background: #00bd56;
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    right: -1000%;
    z-index: 0;
    opacity: 1;
    z-index: -1; }
  .slash:before {
    content: '';
    -ms-transform: skewX(-40deg);
    transform: skewX(-40deg);
    -webkit-transform: skewX(-40deg);
    background: #207dff;
    position: absolute;
    right: 50%;
    top: 0;
    bottom: 0;
    left: -1000%;
    z-index: -1;
    opacity: 1; }

.scoreboard {
  width: 100%;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  border-radius: 4px;
  position: relative;
  z-index: 0;
  padding: 60px 0; }
  @media (min-width: 992px) {
    .scoreboard {
      padding-bottom: 12em; } }
  .scoreboard.scoreboard-2 {
    overflow: hidden;
    margin-bottom: 30px;
    padding: 60px 30px; }
    @media (min-width: 992px) {
      .scoreboard.scoreboard-2 {
        padding-bottom: 60px; } }


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
    <h3 class="text-center">XIII SRI LANKA UNIVERSITY GAMES 2019</h3>
	<h4 class="text-center">SWIMMING CHAMPIONSHIP</h4><hr>
    <br>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <div class="table-responsive">
                        <h4 style="color:black;"><center>50m Freestyle- Men</center></h4>
                        <hr class='my-8'>
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s50FM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>50m Freestyle- Women</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s50FW as $s)
                                <tr>
                                    @if($s->Gender=="Women")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>

                </div>
            </div>
        </div>


        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>100m Freestyle- Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s100FM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>100m Freestyle - Women</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s100FW as $s)
                                <tr>
                                    @if($s->Gender=="Women")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>200m Freestyle - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s200FM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>200m Freestyle- Women Result</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s200FW as $s)
                                <tr>
                                    @if($s->Gender=="Women")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>400m Freestyle - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s400FM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>50m Backstroke - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s50BAM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>50m Backstroke - Women</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s50BAW as $s)
                                <tr>
                                    @if($s->Gender=="Women")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>100m Backstroke - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s100BAM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

	<div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>100m Backstroke - Women</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s100BAW as $s)
                                <tr>
                                    @if($s->Gender=="Women")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
             <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>200m Backstroke - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s200BAM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
</div>

	<div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>50m Butterfly - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s50BUM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>50m Butterfly  - Women</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s50BUW as $s)
                                <tr>
                                    @if($s->Gender=="Women")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
</div>
	<div class="row justify-content-md-center">	
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>100m Butterfly - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s100BUM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>100m Butterfly - Women</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s100BUW as $s)
                                <tr>
                                    @if($s->Gender=="Women")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
</div>
	<div class="row justify-content-md-center">
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>200m Butterfly - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s200BUM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="scoreboard scoreboard-2 slash">
                    <h4 style="color:black;"><center>200m Individual Medley - Men</center></h4>
                    <hr class='my-8'>
                    <div class="table-responsive">
                        <table class="table table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>University</th>
                                <th>Time</th>
                            </tr>
                            @foreach($s200IMM as $s)
                                <tr>
                                    @if($s->Gender=="Men")
                                        <td><p>{{$s->Rank}}</p></td>
                                        <td><p>{{$s->PlayerName}}</p></td>
                                        <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                        <td><p>{{$s->FinishTime}}s</p></td>
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

	<div class="row">
    <div class="col-md-6">
        <div class="scoreboard scoreboard-2 slash">
            <h4 style="color:black;"><center>200m Individual Medley - Women</center></h4>
            <hr class='my-8'>
            <div class="table-responsive">
                <table class="table table-dark">
                    <tr>
                        <th>Rank</th>
                        <th>Name</th>
                        <th>University</th>
                        <th>Time</th>
                    </tr>
                    @foreach($s200IMW as $s)
                        <tr>
                            @if($s->Gender=="Women")
                                <td><p>{{$s->Rank}}</p></td>
                                <td><p>{{$s->PlayerName}}</p></td>
                                <td><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                                <td><p>{{$s->FinishTime}}s</p></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
</section>
</body>
@include('footer.footer')
</html>
