
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

    <title>Volleyball Games Result</title>

    <style>
        body{
            font-family: tahoma !important;
            }
        h5{
            color:#cc9b17;
            font-size:25px;
        }
        h6{
            color:white;
        }
        .center{
            display:block;
            margin-left:auto;
            margin-right:auto;
            width:20%;
        }
        @media (max-width: 767.98px) {
            h5{
                font-size:18px;
            }
            .ftco-animate h2{
                font-size:20px;
            }
        }
.square_btn{
    display: inline-block;
    padding: 7px 20px;
	border-radius: 25px;
    text-decoration: none;
    color: #FFF;
    background-image: -webkit-linear-gradient(45deg, #FFC107 0%, #ff8b5f 100%);
    background-image: linear-gradient(45deg, #FFC107 0%, #ff8b5f 100%);
    transition: .4s;
}

.square_btn:hover {
    background-image: -webkit-linear-gradient(45deg, #FFC107 0%, #f76a35 100%);
    background-image: linear-gradient(45deg, #FFC107 0%, #f76a35 100%);
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


<section class="blog">
<br><br>
<div class="container">
	<div class="jumbotron" style="background: linear-gradient(to bottom left, #00ccff 23%, #cc33ff 100%);">
        <div class="heading-section ftco-animate">
                
	            <h2 class="text-center">Volleyball Game Reports</h2>
	    </div>
</div>
</div>
    @if(isset($r))
    <div class="container" align="center">
        <div class="row">
        @foreach($r as $item)
        <div class="col-md-6">
            <div class="scoreboard scoreboard-2 slash" style="background:url(/img/image/volleyball.jpg);background-size:cover;min-height:auto;" data-stellar-background-ratio="0.5">
            <br>
			<div class="divider ftco-animate text-center"><span style="color:#dae44d;font-size:16px;">Round - {{$item->Round}}</span></div>
				<div class="divider ftco-animate text-center mb-4"><span class="x">{{$item->MatchCategory}} | {{$item->Gender}}</span></div>
			        <div class="sport-team-wrap ftco-animate">
				        <div class="d-sm-flex mb-4">
					        <div class="sport-team d-flex align-items-center">
				          		@if($item->Uni1==$item->UniID)
									<img class="img logo" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}">
                                @endif
					        <div class="text-center px-1 px-md-3 desc">
									<h3 class="score win"><span>{{$item->Uni1_Points}}</span></h3>
									<h4 class="team-name" style="color:#dae44d;">{{$item->Uni1}}</h4>
								</div>
					        </div>
					        <div class="sport-team d-flex align-items-center">
								@if($item->Uni2==$item->UniID1)
									<img class="img logo order-sm-last" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image1)) }}">
								@endif
								<div class="text-center px-1 px-md-3 desc">
									<h3 class="score lost"><span>{{$item->Uni2_Points}}</span></h3>
										<h4 class="team-name" style="color:rgba(248, 232, 10, 0.4);">{{$item->Uni2}}</h4>
									</div>
                            </div>
				        </div>
			        </div>
			        <div class="text-center ftco-animate">
                        @if(($item->Uni1_Points>$item->Uni2_Points))
                            <h6 style="color:#cc9b17;font-size:17px;">{{$item->UniName}} Won the Match</h6>
                        @elseif(($item->Uni1_Points<$item->Uni2_Points))
			                <h6 style="color:#cc9b17;font-size:17px;" >{{$item->UniName1}} Won the Match</h6>
                        @endif
				         
				    </div>
			    </div>
	          	</div>
    @endforeach
</div>
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
</section>
@include('footer.footer')

</body>
</html>