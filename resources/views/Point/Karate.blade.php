<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/style2.css">
    <link rel="stylesheet" href="/css/teamGame.css">
    <link rel="stylesheet" href="/css/footer.css">
    <title>Karate Points</title>
	    <style>
         body{
            font-family: tahoma !important;
            }
            
.table th{
    background-image: #d8bfd8;
}
.table td{
    background-color:#fffafa
}
body{
    font-family: tahoma !important;
    }
    @media(max-width: 667px) {
      .table{
          width:300px;

      }
      td{
          font-size:12px;
      }
      h3{
          font-size:15px;
      }
      .btnD2{
          size:10px;
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

<section class="blog1"><br><br>
<div class="container" align="center">
<div class="row">
    <div class="col-md-12">
    <div class="heading-section ftco-animate">
	            <h2 class="text-center" style="color:#dae44d;">Karate Overall Points</h2>
	    </div> <hr>
@if(isset($data))
   <table class="table table-striped table-light">
        <tr>
            <th>University</th>
	    <th></th>
            <th>Points</th>
            <th>Gender</th>

        </tr>

        @foreach($data as $data)
            <tr>
                <td>{{$data->UniName}}</td>	
		<td><img class="img logo" width="50px" height="50px" src="data:image/png;base64,{{ chunk_split(base64_encode($data->Image)) }}"></td>
                <td>{{$data->Points}}</td>
		<td>{{$data->Gender}}</td>
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
