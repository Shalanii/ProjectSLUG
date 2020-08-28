
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
    <title>Swimming Result</title>

    <style>
        body{
            font-family: tahoma !important;
            }
        .display-7{
            font-family:Verdana, Geneva, Tahoma, sans-serif;
            color:white;
        }
                .form-control{
            background: transparent;
            border: none;
            border-bottom:2px solid rgba(255,255,255,.2);
            height:45px;
		width:120px;
            border-radius: 30px;
            background: #cccccc;
            color: #fff;

        }
        .form-control:focus,
        .form-control:hover{
            border:none;
            border-bottom: 2px solid rgba(255,255,255,1);
            box-shadow:none;
        }
        .card-header{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        .size1{
            width:150px;
            height:150px;
        }
        h4{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
        h3{
            color:white;
            font-family:Verdana, Geneva, Tahoma, sans-serif;
        }
		.btn-primary{
    background:#e42448;
    border-color:transparent !important;
    color:#fff !important;
    border-radius:50px;
    padding:10px 25px !important;
    width:100px;
    font-size:13px;
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
    width:200px;
    font-size:13px;
    text-align:center;
    margin:10px 15px;
}
.btn-success:hover{
    background:#731397;
}

.btn-danger{
    background:#731397;
    border-color:transparent !important;
    color:#fff !important;
    border-radius:50px;
    padding:10px 25px !important;
    width:200px;
    text-align:center;
    font-size:13px;
    margin:10px 15px;
}
.btn-danger:hover{
    background:#e42448;
}
p{
            position:relative;
            top:30px;
		font-size:15px;
            color:800000;
        }

               }
        .table th{
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);

        }
        .table td{
            background-color:#fffff0;
        }
        body{
            font-family: tahoma !important;
            }
            @media(max-width: 667px) {
            .table{
                width:400px;
            }
            td p{
                font-size:12px;
                position:relative;
                top:1px;
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
           td .w3-bar-item {
                width:2px;
                height:40px;
            }
    }
.btn-primary{
    background:#e42448;
    border-color:transparent !important;
    color:#fff !important;
    border-radius:50px;
    padding:10px 20px !important;
    width:120px;
    font-size:13px;
    text-align:center;
    margin:10px 15px;
}
.btn-primary:hover{
    background:#731397;
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
<section class="blog"><br><br><br><br>
<div class="container">
	<div class="jumbotron" style="background: linear-gradient(to bottom left, #00ccff 23%, #cc33ff 100%);">
        <div class="heading-section text-center ftco-animate">
		<span class="subheading">SWIMMING - SLUG-XIII</span>
	        <h2 class="mb-4 text-center">Swimming Game Reports</h2>
	    </div>
        <div class="d-flex justify-content-center">
            <form class="form-inline" action="/serachswimmingresult" method="post">
            {{ csrf_field() }}
            <div class="form-group mr-2">       
                <select name="Event" class="form-control" >
                                        <option value="">Search Event</option>
                                        <option value="50m Freestyle">50m Freestyle</option>
                                        <option value="100m Freestyle">100m Freestyle</option>
                                        <option value="200m Freestyle">200m Freestyle</option>
                                        <option value="400m Freestyle">400m Freestyle</option>
                                        <option value="50m Backstroke">50m Backstroke</option>
                                        <option value="100m Backstroke">100m Backstroke</option>
                                        <option value="200m Backstroke">200m Backstroke</option>
                                        <option value="50m Breast stroke">50m Breast stroke</option>
                                        <option value="100m Breast stroke">100m Breast stroke</option>
                                        <option value="200m Breast stroke">200m Breast stroke</option>
                                        <option value="50m Butterfly">50m Butterfly</option>
                                        <option value="100m Butterfly">100m Butterfly</option>
                                        <option value="200m Butterfly">200m Butterfly</option>
                                        <option value="200m Individual Medley">200m Individual Medley</option>
                                    </select>
            </div>
		<div class="form-group">        
                <select name="Gender" class="form-control">
                         <option value="">Select Gender</option>
			 <option value="Men">Men</option>
			 <option value="Women">Women</option>
                </select>
                </div>

            <div class="form-group"> 
            	<input type="submit"  class="btn btn-primary" value="search">
            </div>
            </form>
        </div>
</div>
</div>
<div class="container">
        <div class="row">
                <div class="col-md-12">
                @if(isset($r))        
                    <div class="table-responsive">
                    <table class="table table-hover table-light" align="center">
    <tr>
        <th class="text-center">Place</th>
        <th class="text-center">Round</th>
        <th class="text-center">Player</th>
        <th class="text-center">University</th>
        <th class="text-center">Time</th>
<th></th>
    </tr>

    @foreach($r as $s)
    <tr>
        <td style="text-align:center;" class="bg-primary"><p style="position:relative;top:15px;font-weight:bold;color:#cc9b17;">{{$s->Rank}}</p></td>
        <td style="text-align:center;"><p>{{$s->Event}}({{$s->Gender}})</p></td>
        <td style="text-align:center;"><p>{{$s->PlayerName}}</p></td>
        <td style="text-align:center;"><p>{{$s->UniName}}</p></td>
        <td style="text-align:center;"><p>{{$s->FinishTime}}s</p></td>
	<td ><img class="w3-bar-item" style="width:60px" src="data:image/png;base64,{{ chunk_split(base64_encode($s->Image)) }}"></td>
                           
    </tr>
    @endforeach
</table>
</div>
@elseif(isset($msg))
                <div class="container2" align="center">
                    <div class="col-sm-offset-6 col-sm-6">
                        <div class="alert alert-warning alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>	
                            <strong>{{ $msg }}</strong>
                        </div>
                    </div>
                </div>            
                @endif
</div>
</div>
</div>
</section>
</body>
@include('footer.footer')
</html>
