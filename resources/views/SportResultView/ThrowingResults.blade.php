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

    <title>Throwing Result</title>

    <style>
          h3{
            color:#121212;
            font-size:20px;
            font-weight:bold;
        }
        .bg-primary{
            font-size:20px;
        }
        .form-control option{
            color:black;
        }
               .table th{
            background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
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
		                	.table td{
		background-color:#fffff0;
		
	}
		.table td p{
		
		color:#800000;
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

@media(max-width: 667px) {
      table{
          width:300px;

      }
      td{
          font-size:12px;
      }
      h3{
          font-size:15px;
      }
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
	<div class="jumbotron" style="background: linear-gradient(to bottom left, #00ccff 23%, #cc33ff 100%);">

        <div class="heading-section text-center ftco-animate">
		<span class="subheading">Athletics - SLUG-XIII</span>
	        <h2 class="mb-4 text-center">Throwing Results Reports</h2>
	    </div>
        <div class="d-flex justify-content-center">
            <form class="form-inline" action="/serachthrowingresult" method="post">
            {{ csrf_field() }}
            <div class="form-group mr-2">        
                <select name="Event" class="form-control">
                        <option value="">Select Event</option>
                       	@foreach($r1 as $data)
                            <option value="{{$data->Event}}">{{$data->Event}}</option>
                        @endforeach
                </select>
            </div>
            <div class="form-group mr-2">        
                <select name="Gender" class="form-control">
                        <option value="">Select Gender</option>
                       @foreach($r2 as $data)
                            <option value="{{$data->Gender}}">{{$data->Gender}}</option>
                        @endforeach
                </select>
            </div>

            <div class="form-group mr-2"> 
            <input type="submit"  class="square_btn" value="search">
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
                    <table class="table table-hover table-hover" align="center">
                                    <tr>
					<th>Rank</th>
                                        <th>Event</th>
                                        <th>PlayerName</th>
                                        <th>University</th>
                                        <th>Distance</th>
					<th></th>
                                    </tr>
                        @foreach($r as $item)                 
                                    <tr>
                                        <td style="text-align:center;" class="bg-primary"><p style="position:relative;top:30px;">{{$item->Rank}}</p></td>
                                        <td style="text-align:center;" class=""><p>{{$item->Event}}({{$item->Gender}})</p></td>
					<td style="text-align:center;" class=""><p>{{$item->PlayerName}}</p></td>
                                        <td style="text-align:center;" class=""><p>{{$item->UniName}}</p></td>
                                        <td style="text-align:center;" class=""><p>{{$item->Distance}}m</p></td>
                                        <td><img class="w3-bar-item" style="width:80px" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}"></td>
                                    </tr>
                          
                        @endforeach
                    </table>
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
                </div>
            </div>
    </section>
    @include('footer.footer')
</body>
</html>

