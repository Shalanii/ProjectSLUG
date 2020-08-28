<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/gallery-grid.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code|Nanum+Gothic&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/lightbox.min.css">
    <link rel="stylesheet" href="/js/lightbox-plus-jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
    <title>Slug Images</title>
        <style>
       @media (max-width: 767.98px) {
            h5{
                font-size:18px;
            }
            .gallery{
                position:relative;
		left:40px;
            }
        }
        </style>

</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).scroll(function(){
            $('.navbar').toggleClass('scrolled',$(this).
            scrollTop()>$('.navbar').height());
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
    @include('home.Navbar')

<section class="blog">

<h1>Image Gallery</h1>
@if(isset($imageid))
        <div class="gallery">
          @foreach($imageid as $images)

                <a data-lightbox="my-gallery" href="/albums/{{$images->image}}">
                <img src="/albums/{{$images->image}}" class="img-responsive">
                </a>

          @endforeach
        </div>
      @elseif(isset($message))
      <div class="container2" align="center">
            <div class="col-sm-offset-6 col-sm-6">
                <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                <strong>{{ $message }}</strong>
                </div>
            </div>
      </div>
      @endif

</section>
@include('footer.footer')
</body>
</html>
<style>
    body{
font-family:sans-serif;
    }
    h1{
        text-align:center;
        color:white;
        margin:30px 0 50px;

    }
    .gallery{
        margin:10px 50px;
    }
    .gallery img{
        width:230px;
        padding:5px;
        filter:grayscale(100%);
        transition:1s;
    }
    .gallery img:hover{
        filter:grayscale(0);
        transform:scale(1.1);
    }

</style>
