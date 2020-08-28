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
    <title>Event Schedule</title>

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
        <div class="container2" align="center">
             <div class="col-sm-offset-2 col-sm-10">
               
                <header class="p- text-white text-center">
                    <h3>EVENT SCHEDULE</h3>
                </header>
                    <br>
            
                    <form class="form-inline my-2 my-lg-0" action="/search" method="post" >
                        {{csrf_field()}}
                        <div class="form-group">
                         <input class="form-control mr-sm-2" type="text" placeholder="Search Sport" name="search">
                            <button class="btn btnD2" type="submit"><span class="glyphicon glyphicon-search"></span></button>   
                        </div>
                    </form>
                <br>
                @if(isset($data))
                                <table class="table table-striped table-bordered table-light">
                                    <tr><th align="center">Date</th>
                                        <th align="center">Round</th>
                                        <th align="center">Sport</th>
                                        <th align="center">University 1</th>
                                        <th align="center">University 2</th>
                                        <th align="center">Time</th>
                                        <th align="center">Venue</th>
                                        <th align="center">Gender</th>
                                    </tr>
                                    <tr></tr>
                                    @foreach($data as $task)
                                    <tr></tr>
                                    <tr>
                                        <td align="center">{{$task->Date}}</td>
                                        <td align="center">{{$task->Round}}</td>
                                        <td align="center">{{$task->Sport}}</td>
                                        <td class="bg-primary" align="center" style="font-weight:bold;color:white;">{{$task->Uni1}}</td>
                                        <td class="bg-danger" align="center" style="font-weight:bold;color:white;">{{$task->Uni2}}</td>  
	                                    <td align="center">{{$task->Time}}</td>
                                        <td align="center">{{$task->Venue}}</td>
                                        <td align="center">{{$task->Gender}}</td>
                                    </tr>
                                     @endforeach
                                </table>
                @elseif (isset($message))
                    <div class="alert alert-warning alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>	
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
        </div>
    </div>
</section>
        @include('footer.footer')
    </body>
</html>