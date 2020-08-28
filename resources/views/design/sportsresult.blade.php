<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Heebo|Playfair+Display&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/animate/animated.css">
    <title>Sports Result</title>
<style>
@import url(https://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic,700italic);
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

body{
    font-family: tahoma !important;
}
.card-body{
    padding:0.2rem;
}
.card{
    background-color:#fff;
    border:3px solid rgba(0,0,0,0.125);
    border-radius:0;

}
@media(max-width: 667px) {
    .card{
        position:relative;
        left:5px;
    
    }
    h2 .animated span{
        font-size:15px;
    }
}
.cardSet1{
    background-color:#669999;
}
.cardSet2{
    background-color:#cc6666;
}
.cardSet3{
    background-color:#cc9966;
}
.cardSet4{
    background-color:  #66a6ff;
}
.cardSet5{
    background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
}
.cardSet6{
    background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
}
h3.card-title{
    font-size:1.2rem;
}
.card-img-top{
    height: 200px;
    width: 100%;
}
.center{
    display:block;
    margin-left:auto;
    margin-right:auto;
    width:30%;
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
<section class="blog1"><br>
        <div class="row justify-content-center pb-5">
          <div class="col-md-6 heading-section heading-section-white text-center ftco-animate">
            <img src="img/mascot/SLUG.png" class="animated zoomIn center" style= "animation-delay:1s;" width="200px;" class="">
            <h3 class="animated bounceInRight" style="animation-delay:3s"><span>SPORTS RESULT REPORTS</span></h3>
          </div>
        </div>
<!--<div style="margin:40px;background-color:#ccffdd"><h1 align="center" style="color:red">For the latest results and updates, the official mobile app for SLUG 2019 
		can now be downloaded from the playstore. Get it from
		<a href="https://play.google.com/store/apps/details?id=lk.uordcs.slug"> <u>here</u></a></h1></div>--!>
	
    <div class="container">
        <div class="row">

            <div class="col-md-3 d-flex about-grid">
            <div class="card my-3 cardSet1 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="/img/mascot/baseball.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Baseball Results</h3>
                <a href="/baseballresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>
            </div>
            </div>
            <div class="col-md-3 d-flex about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/badminton.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Badminton Results</h3>
                <a href="/badmintonresult" class="square_btn btn-sm float-right">Show Result</a>
            </div>
            </div>
            </div>
            <div class="col-md-3 d-flex about-grid">
            <div class="card my-3  cardSet3 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/basketball.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Basketball Results</h3>
                <a href="basketballresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
            </div>
            <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet1 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/chess.jpg" class="img-fluid card-img-top img-responsive ">
                <h3 class="card-title">Chess Results</h3>
                <a href="chessresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/carrom.jpg"  class="card-img-top img-responsive img-fluid ">
                <h3 class="card-title">Carrom Results</h3>
                <a href="carromresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet4 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/cricket.jpg"  class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Cricket Results</h3>
                <a href="cricketresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/elle.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Elle Results</h3>
                <a href="/elleresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet3 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/football.jpg"  class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Football Results</h3>
                <a href="footballresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet1 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;"> 
                <div class="card-body">
                <img src="img/mascot/hockey.jpg"   class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Hockey Results</h3>
                <a href="hockeyresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/karate.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Karate Results</h3>
                <a href="/karatekataresult" class="square_btn btn-sm float-left">Kata Result</a>
		        <a href="karatekumiteresult" class="square_btn btn-sm float-right">Kumite Result</a>

                </div>     
            </div>    
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet1 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/netball.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Netball Results</h3>
                <a href="netballresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/roadrace.jpg"  class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Roadrace Results</h3>
                <a href="roadraceresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet5 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/rowing.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Rowing Results</h3>
                <a href="/rowingresults" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet1 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/rugby.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Rugby Results</h3>
                <a href="rugbyresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/swimming.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Swimming Results</h3>
                <a href="resultswimming" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet4 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/tabletennis.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Table Tennis Results</h3>
                <a href="tabletennis" class="square_btn btn-sm float-right">Show Result</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/taekwondo.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Taekwondo Results</h3>
                <a href="/taekwondoresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet3 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/tennis.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Tennis Results</h3>
                <a href="tennisresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet1 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/athletic.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Track & Field Results</h3>
                <a href="trackfield" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet2 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/volly.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Volleyball Results</h3>
                <a href="volleyballresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div> 
        </div> 
    </div>
    <div class="row">
          
        <div class="col-md-3 d-flex align-items-stretch about-grid">
            <div class="card my-3 cardSet1 text-white animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/wrestling.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">Wrestling Results</h3>
                <a href="wrestlingresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-stretch about-grid">
        <div class="card my-3 cardSet2 text-white  animated bounce center" style="width:18rem;height:20rem;animation-delay:3s;">
                <div class="card-body">
                <img src="img/mascot/weight.jpg" class="card-img-top img-responsive img-fluid">
                <h3 class="card-title">WeightLifting Results</h3>
                <a href="/weightresult" class="square_btn btn-sm float-right">Show Result</a>
                </div>     
            </div> 
        </div>
    </div>
    </div>
</section>@include('footer.footer')
</body>
</html>