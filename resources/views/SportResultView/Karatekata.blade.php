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

    <title>Karate Kata Result</title>

    <style>
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

        p{
            position:relative;
            top:30px;
            color:800000;
        }
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
        .table td{
            background-color:#fffff0;
        }
        body{
            font-family: tahoma !important;
            }
            @media(max-width: 667px) {
            .table{
                width:500px;
            }
            td p{
                font-size:10px;
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
          
            .list-group-item{
                font-size:15px;
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
	        <h2 class="mb-4 text-center">Karate Kata Game Reports</h2><hr>
	    </div>
        <div class="d-flex justify-content-center">
            <form class="form-inline" action="/kataresult" method="post">
            {{ csrf_field() }}
            <div class="form-group mr-4"> 
                    <select name="Team_Individual" class="form-control">
                        <option value="">Select Type</option>
                        <option value="Individual">Individual</option>
                        <option value="Team">Team</option>
                    </select>  
            </div>
                       <div class="form-group mr-4"> 
                <select name="Gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="M">Men</option>
                    <option value="W">Women</option>
                <select>    
            </div>
            <div class="form-group mr-2"> 
            <input type="submit"  class="square_btn" value="Search">
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
                    <table class="table table-hover table-dark" align="center">
                                <tr>
                                    <th class="text-center">Player Name</th>
                                    <th class="text-center">University</th>
                                    <th class="text-center">Point</th>
                                    <th></th>
                                </tr>
                                   

                        @foreach($r as $item)  
                                    @if($item->Team_Individual=="Individual")               
                                    <tr>
                                        <td style="text-align:center;" class=""><p>{{$item->PlayerName}}({{$item->Gender}})</p></td>
                                        <td style="text-align:center;" class=""><p>{{$item->UniName}}</p></td>
                                        <td style="text-align:center;" class=""><p>{{$item->Points}}</p></td>
                                        <td><img class="w3-bar-item" style="width:50px" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}"></td>
                                    </tr>
                                    @else
                                        <tr>
                                            
                                        <td style="text-align:center;" class="">
                                                   
                                                    
                                                        <p>Team{{$item->PlayerName2}}({{$item->Gender}})</p>
                                                    
                                        </td>
                                        <td style="text-align:center;"><p>{{$item->UniName}}</p></td>
                                        <td style="text-align:center;"><p>{{$item->Points}}</p></td>
                                        <td><img class="w3-bar-item" style="width:50px" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}"></td>
                                    </tr>          
                                    @endif
                          
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