<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <title>Event Schedule</title>
    <style>
   body{
            font-family: tahoma !important;
            }
.x{
color:ff7f50;
}
.heading-section .subheading {
  font-size: 16px;
  display: block;
  margin-bottom: 0px;
  text-transform: uppercase;
  letter-spacing: 1px;
}

.heading-section h2 {
  font-size: 50px;
  font-weight: 700;
  text-transform: uppercase; 
}
  .heading-section h2 span {
    font-weight: 700;
}
  @media (max-width: 767.98px) {
    .heading-section h2 {
      font-size: 28px; } 

	.scoreboard .scoreboard-2 .slash .divider .ftco-animate span{
		font-size:14px;
		color:white;

	}}


.slash {
  position: relative;
  z-index: 0; }
  .slash:after {
    content: '';
    -ms-transform: skewX(-40deg);
    transform: skewX(-40deg);
    -webkit-transform: skewX(-40deg);
    background: linear-gradient(to right, #33ccff 19%, #ff99cc 100%);
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
    background: #6a5acd;
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
  .scoreboard .divider {
    position: relative; }
    .scoreboard .divider span {
      padding: 0 10px;
      text-transform: uppercase;
      letter-spacing: 1px;
      font-size: 16px;
      color: #fff; }
  .scoreboard .sport-team-wrap {
    position: relative; }
    .scoreboard .sport-team-wrap span.vs {
      position: absolute;
      top: 50%;
      left: 50%;
      margin-left: -20px;
      -webkit-transform: translateY(-50%);
      -ms-transform: translateY(-50%);
      transform: translateY(-50%);
      font-size: 30px;
      line-height: 1;
      color: #fff; }
      @media (max-width: 767.98px) {
        .scoreboard .sport-team-wrap span.vs {
          left: 200px;
          color: #fff;
	  font-size:15px;
          margin-top: -5px; } }
  .scoreboard .sport-team {
    display: block;
    width: 50%; }
    @media (max-width: 767.98px) {
      .scoreboard .sport-team {
        width: 100%; } }
    .scoreboard .sport-team .logo {
      width: 100px;
      height: 100px;
      }
    .scoreboard .sport-team .desc {
      width: calc(100% - 100px); }
      .scoreboard .sport-team .score.win span {
        color: #000000; }
      .scoreboard .sport-team .score.lost span {
        color: rgba(0, 0, 0, 0.4); }
    .scoreboard .sport-team .team-name {
      font-size: 30px;
      font-weight: 700;
      text-transform: uppercase; }
	.btn-primary {
  font-family: tahoma !important;
  font-size: 13px;
  color:black;
  letter-spacing: 1px;
  line-height: 25px;
  border-radius: 50px;
  background: #808080;
  transition: all 0.3s ease 0s;
}
.form-control{
font-family: tahoma !important;
  font-size: 13px;
  color: black;
  letter-spacing: 1px;
  line-height: 15px;
  border-radius: 40px;
  background: #ffffff;
  transition: all 0.3s ease 0s;


}

.btn-primary:hover {
  color: #FFF;
  background: rgba(58, 133, 191, 0.75);
  border: 2px solid rgba(58, 133, 191, 0.75);
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

<section class="blog"><br><br><br>
<div class="container">
<div class="jumbotron" style="background: linear-gradient(to top right, #00ccff 18%, #cc33ff 100%);">
    <div class="row justify-content-sm-center ">
        <div class="col-lg-12">
                    <div class="row justify-content-center">
				<div class="col-md-6 heading-section text-center ftco-animate">
					<span class="subheading">Game Schedule - SLUG-XIII</span>
					<h2>UPCOMING GAMES</h2>
					</div>
				</div><p align="center">you can search sport, Gender and Date</p>
                <div class="d-flex justify-content-center">
			
                     <form class="form-inline" action="/searchSchedule" method="post">
            {{ csrf_field() }}
		<div class="form-group mr-2">        
                    <select name="Sport" class="form-control">
                                <option value="">Please Select Sport</option>        
                       	    @foreach($sport1 as $data1)
                            <option value="{{$data1->Sport}}">{{$data1->Sport}}</option>
                            @endforeach
                    </select>
            </div>
            <div class="form-group mr-4"> 
                   <input type="date" class="form-control" name="date" placeholder="Please Select Date">
            </div>
            
            <div class="form-group mr-4"> 
                <select name="Gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="Men">Men</option>
                    <option value="Women">Women</option>
                <select>    
            </div><br>
            <div class="form-group mr-2"> 
            <input type="submit"  class="square_btn" value="search">
            </div>
            </form><br>
		
                </div>
            </div>
    </div>
</div>
</div><br><br>
   @if(isset($data))
<div class="container" align="center">
<div class="row">
 @foreach($data as $item)
 <div class="col-md-6">
	    <div class="scoreboard scoreboard-2 slash">
			<div class="divider ftco-animate text-center"><span style="color:#dae44d;font-size:20px;font-weight:bold;">{{ ucfirst($item->Sport)}}</span><br><span> 

{{ \Carbon\Carbon::parse($item->Date)->format('jS \\of F Y')}}</span><span style="color:black;"> | {{$item->Round}}</span></div>
				<div class="divider ftco-animate text-center"><span style="color:black;"> | {{$item->Gender}}</span></div>
			        <br><div class="sport-team-wrap ftco-animate">
					<span class="vs">vs</span>
				        <div class="d-sm-flex mb-4">
					        <div class="sport-team d-flex align-items-center">
				          		@if($item->Uni1==$item->UniID)
									<img class="img logo" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}">
                                @endif
								<div class="text-center px-1 px-md-3 desc">
									<h4 class="team-name" style="color:#dae44d;">{{$item->Uni1}}</h4>
								</div>
					        </div>
					        <div class="sport-team d-flex align-items-center">
								@if($item->Uni2==$item->UniID1)
									<img class="img logo order-sm-last" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image1)) }}">
								@endif
								<div class="text-center px-1 px-md-3 desc">
										<h4 class="team-name" style="color:ff7f50;">{{$item->Uni2}}</h4>
									</div>
                            			</div>
				        </div>
			        </div>
				<div class="text-center ftco-animate">
                        		<p class="mb-0">{{$item->Venue}}</p>
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