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

    <title>RoadRace Result</title>

    <style>
        p{
            position:relative;
            top:30px;
            color:800000;
        }
        h3{
            color:#000000;
        }
        .table-bordered{
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
                width:200px;
            }
            td p{
                font-size:12px;
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
                width:5px;
                height:40px;
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
                <h2 class="mb-4 text-center">RoadRace Game Reports</h2>
            </div>
            <div class="d-flex justify-content-center">
                    <form class="form-inline" action="/search19" method="post">
                        {{csrf_field()}}
                        <div class="form-group mr-2"> 
                            <input type="text" name="search" class="form-control"placeholder="Search playername or Rank">       
                        </div>
                            <input type="submit"  class="square_btn" value="search">  
                    </form>
            </div>
	</div>
</div>
        <div class="container">    
            <div class="row">
                <div class="col-md-12" >
                @if(isset($r))
                <div class="table-responsive" >
                    <table class="table table-hover table-striped">
                                    <tr>
                                        <th>Rank</th>
                                        <th>PlayerName</th>
                                        <th>Uni Name</th>
                                        <th>Finish Time</th>
                                        <th></th>
                                    <tr>
                        @foreach($r as $item)    
                                    <tr>
                                        <td class="bg-primary" style="text-align:center;" ><p>{{$item->Rank}}</p></td>
                                        <td><p>{{$item->PlayerName}}</p></td>
                                        <td><p>{{$item->UniName}}</p></td>
                                        <td><p>{{$item->Time}}</p></td>
                                        <td><img class="w3-bar-item" style="width:80px;position:relative;left:10px;" src="data:image/png;base64,{{ chunk_split(base64_encode($item->Image)) }}"></td>
                                    </tr>   
                        @endforeach
                    </table>
                </div>
                @elseif(isset($message))
                <div class="container" align="center">
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
        </div>      
    </section>
    @include('footer.footer')
    </body>
</html>