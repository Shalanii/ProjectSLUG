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

    <title>Wrestling Result</title>

    <style>
	 body{
            color:white;
            font-family: tahoma !important;
            }
	
        h5{
            color:#cc9b17;
            font-size:25px;
        }
	.ftco-animate .text-center{

	position:relative;
	top:45px;
}

        h6{
            color:white;
        }
        .x{
            
            font-weight:bold;
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


<section class="blog"><br><br>
<div class="container">
	<div class="jumbotron" style="background: linear-gradient(to bottom left, #00ccff 23%, #cc33ff 100%);">

        <div class="heading-section ftco-animate">
	        <h2 class="mb-4 text-center">Wrestling Game Reports</h2>
	    </div><br><br>
        <div class="d-flex justify-content-center">
            <form class="form-inline" action="/wrestling1" method="post">
            {{csrf_field()}}

            <div class="form-group mr-2">        
            <select name="Round" class="form-control">
                    <option value="">Select Round</option>
                    <option value="Preliminary">Preliminary</option>
                    <option value="Quarter Finals">Quarter Finals</option>
                    <option value="Semi Finals">Semi Finals</option>
                    <option value="Consolation Finals">Consolation Finals</option>
                    <option value="Finals">Finals</option>
                </select>
            </div>
            <div class="form-group mr-2">        
                <select name="weightclass" class="form-control">
                    <option value="">select Weight Category</option>
                    <option value="57KG">57KG</option>
                    <option value="61KG">61KG</option>
                    <option value="65KG">65KG</option>
                    <option value="70KG">70KG</option>
                    <option value="74KG">74KG</option>
                    <option value="79KG">79KG</option>
                    <option value="86KG">86KG</option>
                    <option value="92KG">92KG</option>
                    <option value="97KG">97KG</option>
                    <option value="125KG">125KG</option>
                </select>
            </div>
            <div class="form-group mr-2"> 
            <input type="submit"  class="square_btn" value="search">
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
	    <div class="scoreboard scoreboard-2 slash" style="background:url(/img/image/wrestl.jpg);background-size:cover;min-height:auto;" data-stellar-background-ratio="0.5">
			<br><div class="divider ftco-animate text-center"><span class="x">{{$item->Date}} | {{$item->Round}}</span></div>
				<div class="divider ftco-animate text-center mb-4"><span class="x">MatchNo - {{$item->MatchNo}} WeightClass - {{$item->WeightCategory}}</span></div>
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
                            <h5>{{$item->UniName}}</h5> <h6>Won the Match</h6>
                        @elseif(($item->Winner==$item->Uni2))
			                <h5>{{$item->UniName1}}</h5> <h6>Won the Match</h6>
                        @else
                            <h5>DRAW</h5> <h6>the Match</h6>
                        @endif
				          	<p class="mb-0"><a href="#" class="btn btn-black">More Details</a></p>
				    </div>
			    </div>
	        </div>
            @endforeach
     @elseif(isset($message))
                <div class="container2" align="center">
                    <div class="col-sm-offset-6 col-sm-6">
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">×</button>	
                            <strong>{{ $message }}</strong>
                        </div>
                    </div>
                </div>            
                </div>
                @endif
            </div>
    </section>
    @include('footer.footer')
</body>
</html>