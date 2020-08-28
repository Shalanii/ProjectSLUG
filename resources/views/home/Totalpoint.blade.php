<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/animate/animated.css">
    <title>Total Point</title>
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


</style>
</head>
<body>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        @include('home.Navbar')
    <section class="blog"><br><br><br><br>
    <div class="container">
        
        <div class="about">
            <h3 style="color:white;font-weight:bold;font-size:25px;"><center>Overall Total Points</center></h3>
        
            <div class="row">
                <div class="col-md-4 crl1 about-grid">
                        <img src="/img/mens2.jpg" style="width: 18rem; height: 12rem;">
                                <h5>Men's Total Points</h5>
                                <a href="/MensTotal" class="square_btn float-center">Show Point</a>   
                </div>
                <div class="col-md-4 crl2 about-grid"> 
                        <img src="/img/womens2.jpg" style="width: 18rem; height: 12rem;"> 
                                <h5>Women's Total Points</h5>     
                                <a href="/WomensTotal" class="square_btn float-center">Show Point</a>
                </div>
                <div class="col-md-4 crl3 about-grid">   
                        <img src="/img/both2.jpg" style="width: 18rem; height: 12rem;">
                                <h5>Total Points</h5> 
                                <a href="/Total" class="square_btn float-center">Show Point</a>        
                </div>
            </div>
        </div>
        </div>

</div>  
    </section>     
 @include('footer.footer')
</body>
</html>