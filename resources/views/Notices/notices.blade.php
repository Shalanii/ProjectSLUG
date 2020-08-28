<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Notices</title>
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/sportsresult.css">
    <style>
         body{
            font-family: tahoma !important;
            }
            
.table th{
    background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
}
.table td{
    background-color:#669999;
}
body{
    font-family: tahoma !important;
    }
    @media(max-width: 667px) {
      .table{
          width:200px;

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
        <section class="blog">
        <div class="container">
        <div class="col-sm-12">
        <div class="heading-section ftco-animate">
	        <h2 class="mb-4 text-center">Notices</h2>
	    </div>
       <br><br>
	@if(isset($tasks))
        <div class="table-responsive">
        <table class="table table-bordered table-condensed" align="center">
          <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Title</th>
              <th>Notice</th>
                      </tr>
          @foreach($tasks as $data)
          <tr>
              <td>{{$data->Date}}</td>
              <td>{{$data->Time}}</td>
              <td>{{$data->Title}}</td>
              <td>{{$data->Notice}}</td>
          </tr>
          @endforeach
      </table>
        </div>
	@elseif($message)
		<div class="container2" align="center">
            <div class="col-sm-offset-6 col-sm-6">
                <div class="alert alert-primary alert-block">
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