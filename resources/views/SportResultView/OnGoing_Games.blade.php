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

    <title>Ongoing Games</title>

    <style>
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


<section class="blog"><br><br><br>
    <div class="heading-section ftco-animate">
        <h2 class="mb-4 text-center" style="color:white;">Live Updates</h2><hr>
    </div>

    @if(isset($r))
        <div class="container" align="center">
            <div class="row">
                @foreach($r as $item)
                    <div class="col-md-6">
                        <div class="scoreboard scoreboard-2 slash">
				 <h3>{{$item->Sport}}</h3>
                            <div class="divider ftco-animate text-center mb-4"><span>{{$item->Round}} | {{$item->MatchNo}}</span></div>
                            <div class="sport-team-wrap ftco-animate">
                                <span class="vs">vs</span>
                                <div class="d-sm-flex mb-4">
                                    <div class="sport-team d-flex align-items-center">
                                        @if($item->Uni1==$item->UniID)
                                            <img class="img logo" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}">
                                        @endif
                                        <div class="text-center px-1 px-md-3 desc">
                                            <h3 class="score win"><span>{{$item->Uni1_Score}}</span></h3>
                                            <h4 class="team-name">{{$item->Uni1}}</h4>
                                        </div>
                                    </div>
                                    <div class="sport-team d-flex align-items-center">
                                        @if($item->Uni2==$item->UniID1)
                                            <img class="img logo order-sm-last" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image1)) }}">
                                        @endif
                                        <div class="text-center px-1 px-md-3 desc">
                                            <h3 class="score lost"><span>{{$item->Uni2_Score}}</span></h3>
                                            <h4 class="team-name">{{$item->Uni2}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

</section>

@include('footer.footer')

</body>
</html>








