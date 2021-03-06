
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
    <title>Poomsae Result</title>

    <style>

        body{
            font-family: tahoma !important;
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
.card{
    box-shadow:2px 2px;
}
h3,h4,h5{
		color:white;
		font-size:24px;
    }
  @media (max-width: 767.98px) {
	.card-body h4{
		font-size:15px;

		}
	.card-body .table th,td{
		font-size:12px;
		}
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
    <div class="row">
    <div class="col-md-6 col-sm-6">
    <div class="card mt-3">
        <div class="card-body">       
        <h4 align="center" style="color:black;">Poomsae Individual Final Results - Men</h4>
        <div class="table-responsive">
        <table class="table table-hover">
            <tr>
		 <th>Rank</th>
		<th>Player</th>
                <th>University</th>                        
                <th></th>
            </tr>
         
            @foreach($r as $s)
                <tr>
		    <td style="font-weight:bold;">{{$s->Rank}}</td>
			<td>{{$s->PlayerName}}</td>
                    <td>{{$s->UniName}}</td>
			<td><img class="w3-bar-item" style="width:50px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                </tr>
            @endforeach
        </table>
            </div>
        </div>
        </div>
    </div>
    
    <div class="col-md-6 col-sm-6">
    <div class="card mt-3">
        <div class="card-body">   
        <h4 align="center" style="color:black;">Poomsae Individual Final Results - Women</h4>
        <div class="table-responsive">
        <table class="table table-hover">
            <tr>
		<th>Rank</th> <th>Player</th>
                <th>University</th>
                    
                <th></th>
            </tr>

            @foreach($r1 as $s)
                <tr>
		    <td style="font-weight:bold;">{{$s->Rank}}</td>  <td>{{$s->PlayerName}}</td>
                    <td>{{$s->UniName}}</td>
                                                    
                    <td><img class="w3-bar-item" style="width:50px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}">
                </tr>
            @endforeach
        </table>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-6 col-sm-6">
    <div class="card mt-3">
        <div class="card-body">    
        <h4 align="center" style="color:black;">Poomsae Team Final Results - Men</h4>
        <div class="table-responsive">
        <table class="table table-hover">
            <tr>
		 <th>Rank</th>
                <th>University</th>
                               
                <th></th>
            </tr>
            @foreach($r2 as $s)
                <tr>
		    <td style="font-weight:bold;">{{$s->Rank}}</td>
                    <td>{{$s->UniName}}</td>
                                       <td><img class="w3-bar-item" style="width:50px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}">
                </tr>
            @endforeach
        </table>
</div>
</div>
</div>
</div>

<div class="col-md-6 col-sm-6">
    <div class="card mt-3">
        <div class="card-body"> 
        <h4 align="center" style="color:black;">Poomsae Team Final Results - Women</h4>
        <div class="table-responsive">
        <table class="table table-hover">
            <tr>
		                <th>Rank</th>
                <th>University</th>
                
                <th></th>
            </tr>
            @foreach($r3 as $s)
                <tr>
			<td style="font-weight:bold;">{{$s->Rank}}</td>
                    <td>{{$s->UniName}}</td>
                                        <td><img class="w3-bar-item" style="width:50px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}">
                </tr>
            @endforeach
        </table>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</body>
@include('footer.footer')
</html>
