<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/teamGame.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/sportsresult.css">
    <title>Home</title>
<style>

.ftco-animate h2{

	position:relative;
	top:45px;
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
    <section class="blog1">
  
        <div class="row justify-content-center pb-5">
                <div class="col-md-6 heading-section heading-section-white text-center ftco-animate">
	                <h2 class="mb-4 text-center" style="color:white;">SLUG - XIII GAME POINTS</h2><hr>
                </div>
        </div>  
        <br><br><br><br><br><hr> 
		
                <div class="container">
                <div class="row justify-content-center" style="position:relative;left:120px;">
		 <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/athletic.jpg" class="imageBox">
                                        <h5 class="card-title">Track & Field Point</h5>
                                     <a href="athleticpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/badminton.jpg" class="imageBox">
                                        <h5 class="card-title">Badminton Point</h5>
                                     <a href="badmintonpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/baseball.jpg" class="imageBox">
                                        <h5 class="card-title">Baseball Point</h5>
                                     <a href="baseballpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/basketball.jpg" class="imageBox">
                                        <h5 class="card-title">Basketball Point</h5>
                                     <a href="basketballpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/carrom.jpg" class="imageBox">
                                        <h5 class="card-title">Carrom Point</h5>
                                     <a href="carrompoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/cricket.jpg" class="imageBox">
                                        <h5 class="card-title">Cricket Point</h5>
                                     <a href="cricketpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/elle.jpg" class="imageBox">
                                        <h5 class="card-title">Elle Point</h5>
                                     <a href="ellepoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/football.jpg" class="imageBox">
                                        <h5 class="card-title">Football Point</h5>
                                     <a href="footballpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/hockey.jpg" class="imageBox">
                                        <h5 class="card-title">Hockey Point</h5>
                                     <a href="hockeypoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/karate.jpg" class="imageBox">
                                        <h5 class="card-title">Karate Point</h5>
                                     <a href="karatepoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/rugby.jpg" class="imageBox">
                                        <h5 class="card-title">Rugby Point</h5>
                                     <a href="rugbypoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/rowing.jpg" class="imageBox">
                                        <h5 class="card-title">Rowing Point</h5>
                                     <a href="" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/roadrace.jpg" class="imageBox">
                                        <h5 class="card-title">RoadRace Point</h5>
                                     <a href="" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/swimming.jpg" class="imageBox">
                                        <h5 class="card-title">Swimming Point</h5>
                                     <a href="swimmingpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/tabletennis.jpg" class="imageBox">
                                        <h5 class="card-title">Table Tennis Point</h5>
                                     <a href="tabletennispoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/taekwondo.jpg" class="imageBox">
                                        <h5 class="card-title">Taekwondo Point</h5>
                                     <a href="taekwondopoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/tennis.jpg" class="imageBox">
                                        <h5 class="card-title">Tennis Point</h5>
                                     <a href="tennispoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/volly.jpg" class="imageBox">
                                        <h5 class="card-title">Volleyball Point</h5>
                                     <a href="volleyballpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
                <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/netball.jpg" class="imageBox">
                                        <h5 class="card-title">Netball Point</h5>
                                     <a href="netballpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>
		 <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/wrestling.jpg" class="imageBox">
                                        <h5 class="card-title">Wrestling Point</h5>
                                     <a href="wrestlingpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>

		 <div class="col-md-3 d-flex">
                        <div class="card my-3 cardSet1 text-white">
                                <div class="card-body">
                                        <img src="/img/mascot/weight.jpg" class="imageBox">
                                        <h5 class="card-title">WeightLifting Point</h5>
                                     <a href="weightpoints" class="btn btnD3">Show Point</a>
                                </div>
                        </div>  
                </div>

               
            </div>
        </div>
</section>

   @extends('footer.footer')
</body>
</html>