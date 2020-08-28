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
    <link rel="stylesheet" href="/css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700&display=swap" rel="stylesheet">

    <title>Schedule</title>

</head>
<style>

.table th{
    background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);
}
.table td{
    background-color:#f5f5f5;
}
.ftco-animate h3 span{

	position:relative;
	top:45px;
}
body{
    font-family: tahoma !important;
    }
    @media(max-width: 667px) {
      .table{
          width:400px;

      }
      td{
          font-size:12px;
      }
      h3 span{
          font-size:30px;
      }
      .btnD2{
          size:10px;
      }
    }

</style>
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

<div class="blog" align="center">
    <div class="col-md-10">
	<div class="row justify-content-center">	
          <div class="col-md-6 heading-section heading-section-white text-center ftco-animate">
            <h3 class="animated bounceInRight" style="animation-delay:3s"><span>GAMES SCHEDULE SLUG XIII</span></h3>
          </div>
        </div><br><br><br>
    <div class="table-responsive">
    <table class="table table-striped table-hover">
        <tr>
            <th>Event</th>
            <th>Date</th>
            <th>Venue</th>
            <th>Games Rules</th>
        </tr>
        @foreach($d as $data)
        <tr>
            <td>{{$data->Event}}</td>
            <td>{{$data->Dates}}</td>
		@if($data->Event=='Rugby Football - M')
			<td><a href='/BOIKoggala'>BOI Ground-Koggala</a>, <a href='/Beliatta'>Beliatta</a>, <a href='/UniOfPera'> University of Peradeniya</a></td>
		@elseif($data->Event=='Netball - W')
			<td><a href='/UniOfRuhuna'>University of Ruhuna</a>, <a href='/KotawilaIndoor'>Kotawila</a></td>
		@elseif($data->Event=='Football - M')
			<td><a href='/Uyanwatta'>Uyanwatta</a>, <a href='/Kotawila'>Kotawila</a></td>
		@elseif($data->Event=='Elle - M,W')
			<td><a href='/UniOfRuhuna'>University of Ruhuna</a>, <a href='/Uyanwatta'>Uyanwatta</a></td>
		@elseif($data->Event=='Baseball - M')
			<td><a href='/UniOfRuhuna'>University of Ruhuna</a>, <a href='/Kotawila'>Kotawila</a></td>
		@elseif($data->Event=='Volleyball - M,W')
			<td><a href='/KotawilaIndoor'>Kotawila</a></td>
		@elseif($data->Event=='Cricket - M')
			<td>All University Grounds</a></td>
		@elseif($data->Event=='Hockey - M,W')
			<td>Matara</a></td>
		@else
            <td><a href="/{{$data->Venue}}">{{$data->Venue}}</a></td>
		@endif

		@if($data->Event=='Opening Ceremony' || $data->Event=='Closing Ceremony')
		<td></td>
		@else
            <td><a href="/{{$data->Event}}Rules" class="btn btnD2" style="color:#dae44d;">Rules</a></td>
		@endif
        </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
@include('footer.footer')
</body>
</html>
