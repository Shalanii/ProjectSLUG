<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style1.css">
    <title>Streams</title>

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
<br><br><br><br>
        <div class="container h100">
            <div class="contentBox h100">
        <form class="form-inline my-2 my-lg-0" action="/search" method="post" >
                  <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
                  <button class="btn btnD2" type="submit">Search</button>   
        </form>
        </div>
    </div>
    <?php
        $apikey='AIzaSyB7Cm_DB_06-AJRlWA52jRZq2DO5SVugrc';
        $channelid='UC4i_9WvfPRTuRWEaWyfKuFw';
        $maxresults=10;


        $videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&channelId='.$channelid.'&maxresults='.$maxresults.'&key='.$apikey.''));

        foreach($videoList->items as $item){
            if(isset($item->id->videoId)){
                echo '<div class="youtube-video" align="center">
                    <iframe width="560" height="300" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
                    <h3>'. $item->snippet->title .'</h3><p>'. $item->snippet->description .'</p></div>';
                    }
                }
        ?>

        @include('home.footer')
</body>
</html>