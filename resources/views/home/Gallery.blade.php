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
    <title>Sports Albums</title>
    <style>
        body{
            font-family: tahoma !important;
            }
        hr{
            color:white;
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
<h2 align="center" style="color:white;">Sports Albums</h2>
<div class="container">
<div class="container pt-5 pb-5">
<div class="row pb-5">
@foreach($albums as $album)
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="card effect2  text-white mt-3">
    <img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}" class="card-img">
    <div class="card-img-overlay ovl">
    <h4 class="card-title text-center">{{$album->name}}</h3>
    <a href="/show/{{$album->id}}" class="btn btn-danger btn-sm float-center">Show Images</a>
    </div>
    </div>
</div>
@endforeach
</div>
</div>
</div>
</section>
@include('footer.footer')
</body>
</html>



<style>
     * Effect 2
 * ===============================================*/
.effect2
{
  position: relative;
}
.effect2:before, .effect2:after
{
  z-index: -1;
  position: absolute;
  content: "";
  bottom: 15px;
  left: 10px;
  width: 50%;
  top: 80%;
  max-width:300px;
  background: #777;
  -webkit-box-shadow: 0 15px 10px #777;
  -moz-box-shadow: 0 15px 10px #777;
  box-shadow: 0 15px 10px #777;
  -webkit-transform: rotate(-3deg);
  -moz-transform: rotate(-3deg);
  -o-transform: rotate(-3deg);
  -ms-transform: rotate(-3deg);
  transform: rotate(-3deg);
}
.effect2:after
{
  -webkit-transform: rotate(3deg);
  -moz-transform: rotate(3deg);
  -o-transform: rotate(3deg);
  -ms-transform: rotate(3deg);
  transform: rotate(3deg);
  right: 10px;
  left: auto;
}
.btn-danger{
    background:#731397;
    border-color:transparent !important;
    color:#fff !important;
    border-radius:50px;
    padding:10px 20px !important;
    position:relative;
    left:10px;
    width:150px;
    text-align:center;
    margin:10px 15px;
}
h4,p{
    color:white;
    font-weight:bold;
}
.btn-danger:hover{
    background:#e42448;
}


.ovl{
    opacity:0;
    transition:1s;

}
.ovl:hover{
    opacity:1.5;
    background:rgb(0,0,0,0.6);
}


</style>