
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
    <link rel="stylesheet" href="/css/sportsresult.css">
    <title>Sparring Result</title>

    <style>
        body{
            font-family: tahoma !important;
            }
	h3,h4{
		color:white;
		font-size:24px;
	}
		.btn-primary{
    background:#e42448;
    border-color:transparent !important;
    color:#fff !important;
    border-radius:50px;
    padding:10px 25px !important;
    width:160px;
    text-align:center;
    margin:10px 15px;
}
.btn-primary:hover{
    background:#731397;
}

.btn-success{
    background:#181174;
    border-color:transparent !important;
    color:#fff !important;
    border-radius:50px;
    padding:10px 25px !important;
    width:160px;
    text-align:center;
    margin:10px 15px;
}
.btn-success:hover{
    background:#731397;
}
            h6{
            color:white;
        }
      
        @media (max-width: 767.98px) {
            h5{
                font-size:18px;
            }
            .ftco-animate h2{
                font-size:20px;
            }
        }
        .btn-danger{
    background:#731397;
    border-color:transparent !important;
    color:#fff !important;
    border-radius:50px;
    padding:10px 25px !important;
    width:200px;
    text-align:center;
    margin:10px 15px;
}
.btn-danger:hover{
    background:#e42448;
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
        <h3 class="text-center">XIII SRI LANKA UNIVERSITY GAMES 2019</h3>
        <h4 class="text-center">TAEKWONDO CHAMPIONSHIP</h4>
        <h5 class="text-center">Sparring Result</h5>
<hr>
<div class="d-flex justify-content-center">
            <form class="form-inline" action="/searchsparring" method="post">
            {{csrf_field()}}

            <div class="form-group mr-2">        
            <select name="Round" class="form-control">
                    <option value="">Select Round</option>
                    <option value="Preliminary">Preliminary</option>
                    <option value="Quarter Finals">Quarter Finals</option>
                    <option value="Semi Finals">Semi Finals</option>
                    <option value="Finals">Finals</option>
                </select>
            </div>
            <div class="form-group mr-2">        
                    <select name="WeightCategory" class="form-control">
                        <option value="">Select Weight Class</option>
                        <option value="-45Kg">-45Kg</option>
                        <option value="-50Kg">-50Kg</option>
                        <option value="-60Kg">-60Kg</option>
                        <option value="-61Kg">-61Kg</option>
                        <option value="-67Kg">-67Kg</option>
                        <option value="-68Kg">-68Kg</option>
                        <option value="+68Kg">+68Kg</option>
                        <option value="-75Kg">-75Kg</option>
                        <option value="-84Kg">-84Kg</option>
                        <option value="+84Kg">+84Kg</option>
                    </select>
            </div>
            <div class="form-group mr-2">        
                    <select name="Gender" class="form-control">
                        <option value="">Select Weight Class</option>
                        <option value="M">Men</option>
                        <option value="W">Women</option>
                    </select>
            </div>
            <div class="form-group mr-2"> 
            <input type="submit"  class="btn btn-danger btn-sm" value="search">
            </div>
        </form>
    </div>
</div>        
</div>

<div class="container" align="center">
@if(isset($r)) 
<div class="row">
    @foreach($r as $item)
    <div class="col-md-6">
	    <div class="scoreboard scoreboard-2 slash" style="background:url(/img/image/taek.jpg);background-size:cover;min-height:auto;" data-stellar-background-ratio="0.5">
			<br><div class="divider ftco-animate text-center"><span class="x" style="color:#dae44d;font-weight:bold;font-size:20px;">{{$item->Date}} | {{$item->Round}}</span></div>
				<div class="divider ftco-animate text-center mb-4"><span class="x">Match No - {{$item->MatchNo}} WeightClass {{$item->WeightCategory}}</span></div>
			        <div class="sport-team-wrap ftco-animate">
				        <div class="d-sm-flex mb-4">
					        <div class="sport-team d-flex align-items-center">
				          		@if($item->Uni1==$item->UniID)
									<img class="img logo" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}">
                                @endif
								<div class="text-center px-1 px-md-3 desc">
									<h3 class="score win"><span>{{$item->Uni1_Score}}</span></h3>
                                    <h4 class="team-name" style="color:#dae44d;">{{$item->Uni1}}</h4>
                                    <p>{{$item->Uni1_Player}}</p>
								</div>
					        </div>
					        <div class="sport-team d-flex align-items-center">
								@if($item->Uni2==$item->UniID1)
									<img class="img logo order-sm-last" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image1)) }}">
								@endif
								<div class="text-center px-1 px-md-3 desc">
									<h3 class="score lost"><span>{{$item->Uni2_Score}}</span></h3>
                                        <h4 class="team-name" style="color:rgba(248, 232, 10, 0.4);">{{$item->Uni2}}</h4>
                                        <p>{{$item->Uni2_Player}}</p>
									</div>
                            </div>
				        </div>
			        </div>
			        <div class="text-center ftco-animate">
                        @if(($item->Winner==$item->Uni1))
                            <h6 style="color:#cc9b17;font-size:20px;">{{$item->UniName}} Won the Match</h6>
                        @elseif(($item->Winner==$item->Uni2))
			                <h6 style="color:#cc9b17;font-size:20px;">{{$item->UniName1}} Won the Match</h6>
                        @else
                            <h6 style="color:#cc9b17;font-size:20px;">DRAW the Match</h6>
                        @endif
				    </div>
			    </div>
	        </div>
            @endforeach
            @elseif(isset($message))
                <div class="container2" align="center">
                    <div class="col-sm-offset-6 col-sm-6">
                        <div class="alert alert-danger alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                </div>            
                </div>
                @endif
            </div>
</section>
</body>
@include('footer.footer')
</html>
