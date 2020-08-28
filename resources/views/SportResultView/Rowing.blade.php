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

    <title>Rowing Results</title>

    <style>
        p{
            position:relative;
            top:30px;
            color:white;
        }
        h3{
            color:#000000;
        }
	  	.table td{
		background-color:#fffff0;
		
	}
		.table td p{
		
		color:#800000;
		font-size:13px;
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
    <div class="heading-section ftco-animate">
        <h2 class="mb-4 text-center">Rowing Game Reports</h2>
    </div>

    <!--
    <div class="d-flex justify-content-center">
        <form class="form-inline" action="/search15" method="post">
            {{csrf_field()}}
            <div class="form-group mr-2">
                <input type="text" name="search" class="form-control"placeholder="Search round or matchno">
            </div>
            <input type="submit"  class="btn btnD2" value="search">
        </form>
    </div>

    --!>

    <div class="container">
        <div class="row">
            <div class="col-md-6" >
                <div class="table-responsive" >
                    @if($r->count()>0)
                        <h3 class="mb-4 text-center" style="color:white;">Rowing - Results (Men)</h3><hr>
                        <table class="table table-bordered table-dark">
                                <tr>
                                    <th>Rank</th>
                                    <th>Category</th>
                                    <th>Finish time</th>
                                    <th>University</th>
                                                                    </tr>
                            @foreach($r as $item)
                                <tr>
                                    <td class="bg-primary" style="text-align:center;" ><p>{{$item->Rank}}</p></td>
                                    <td><p>{{$item->MatchCategory}}</p></td>
                                    <td><p>{{$item->FinishTime}}</p></td>
                                    <td><p>{{$item->Uni}}</p> <img class="w3-bar-item" style="width:50px;position:relative;left:70px;" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}"></td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>

            <div class="col-md-6" >
                <div class="table-responsive" >
                    @if($r->count()>0)
                        <h3 class="mb-4 text-center" style="color:white;">Rowing - Results (Women)</h3><hr>
                        <table class="table table-bordered table-dark">
                            <tr>
                                <th>Rank</th>
                                <th>Category</th>
                                <th>Finish time</th>
                                <th>University</th>
                            </tr>
                            @foreach($rr as $item)
                                <tr>
                                    <td class="bg-primary" style="text-align:center;" ><p>{{$item->Rank}}</p></td>
                                    <td><p>{{$item->MatchCategory}}</p></td>
                                    <td><p>{{$item->FinishTime}}</p></td>
                                    <td><p>{{$item->Uni}}</p> <img class="w3-bar-item" style="width:50px;position:relative;left:70px;" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}"></td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@include('footer.footer')
</body>
</html>


