<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/sportsresult.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <title>TableTennis Games Result</title>
    <style>
        p{
            position:relative;
            top:30px;
        }
        .table-bordered{
            color:black;
        }
        .table th{
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
        }
          	.table td{
		background-color:#fffff0;
		
	}
		.table td p{
		
		color:#800000;
		font-size:13px;
	}
        body{
            font-family: tahoma !important;
            }
            @media(max-width: 667px) {
            .table{
                width:200px;
            }
            td .list-item-group{
                font-size:12px;
            }
            h3{
                font-size:15px;
            }
            .btnD2{
                size:10px;
            }
            th{
                font-size:15px;
            }
            td{
                height:20px;
            }
            td p{
                font-size:10px;
            }
           td .w3-bar-item {
                width:5px;
                height:40px;
            }
        h3{
            color:#121212;
            font-size:20px;
            font-weight:bold;
        }
    }
        .bg-primary{
            font-size:20px;
        }
        .form-control option{
            color:black;
        }
        .list-group-item{
            color:black;
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
<div class="container">
	<div class="jumbotron" style="background: linear-gradient(to bottom left, #00ccff 23%, #cc33ff 100%);">
        <div class="heading-section ftco-animate">
	        <h2 class="mb-4 text-center">TableTennis Games Reports</h2>
	    </div>
</div>
</div>
            {{--<h2>Match{{$d->MatchNo}}</h2> --}}
<div class="container">
<div class="row">
    <div class="col-md-12">

    @if(isset($d))
    <div class="table-responsive">
        <table class="table table-hover table-dark table-sm">
            <th>MatchCategory</th>
            <th>Uni1 Players</th>
            <th>Uni2 Players</th>
            <th>Points</th>
            <th>Winner Team</th>
        @foreach($d as $item)
            @if($item->MatchCategory=='1st Single' || $item->MatchCategory=='2nd Single' || $item->MatchCategory=='3rd Single')
        <tr>
            <td><li class="list-group-item">{{$item->MatchCategory}}</li></td>
            <td><li class="list-group-item">{{$item->Uni1_P1}} ({{$item->Uni1}})</li></td>
            <td><li class="list-group-item">{{$item->Uni2_P1}} ({{$item->Uni2}})</li></td>
            <td align="center"><p style="font-weight:bold;color:black;">{{$item->Uni1_Points}} : {{$item->Uni2_Points}}</p></td>
            <td>
                @if($item->Uni1_Points>$item->Uni2_Points)
                <img class="w3-bar-item" align="center" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}">
                @else
                <img class="w3-bar-item" align="center" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image1)) }}">
                @endif
            </td>
        </tr>
                @else
                <tr>
                    <td><li class="list-group-item">{{$item->MatchCategory}}</li></td>
                    <td><li class="list-group-item">{{$item->Uni1_P1}} ({{$item->Uni1}})</li>
                        <li class="list-group-item">{{$item->Uni1_P2}} ({{$item->Uni1}})</li>
                    </td>
                    <td><li class="list-group-item">{{$item->Uni2_P1}} ({{$item->Uni2}})</li>
                        <li class="list-group-item">{{$item->Uni2_P2}} ({{$item->Uni2}})</li>
                    </td>
                    <td align="center"><p style="font-weight:bold;color:black;">{{$item->Uni1_Points}} : {{$item->Uni2_Points}}</p></td>
                    <td>
                        @if($item->Uni1_Points>$item->Uni2_Points)
                        <img class="w3-bar-item" style="width:60px" align="center" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}">
                        @else
                        <img class="w3-bar-item" style="width:60px" align="center" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image1)) }}">
                        @endif
                    </td>
                </tr>
            @endif

        @endforeach
    </table>
    </div>
        @elseif(isset($message))
                <div class="container2" align="center">
                    <div class="col-sm-offset-6 col-sm-6">
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                </div>            
        @endif
    </div>
    </div>
    </div>
    </section>
    @include('footer.footer')
    </body>
    </html>
