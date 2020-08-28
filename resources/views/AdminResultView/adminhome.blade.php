<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/css/style1.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>

.logo-image{
        width: 70px;
        height: 70px;
        border-radius: 50%;
        overflow: hidden;
        margin-top: -1px;
    }

</style>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="logo-image">
                <img src="/img/slugImage.jpg" class="img-fluid">
            </div>
            <div class="navbar-brand">SLUG-2019</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse navbar-header " id="navbarColor02">
                <ul class="navbar-nav ml-auto">
                    <li>
                    <a href="/import_excel" class="nav-link">
                        Players
                    </a>
                    </li>
                    <li>
                        <a href="/Events" class="nav-link">
                        EventSchedule
                        </a>
                    </li>
                    <li>
                        <a href="/addresult" class="nav-link">
                        Results
                        </a>
                    </li>
                  		
			 <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Point
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/import_points">Add Team Point</a>
                                    <a class="dropdown-item" href="pointtable">Update Total Point</a>
                                    </div>
                                </li>
		<li>
                        <a href="/AddOngoingGames" class="nav-link">
                         Ongoing Games
                        </a>
                    </li>


                    <li>
                        <a href="" class="nav-link">
                         Accomadation
                        </a>
                    </li>
                    <li>
                        <a href="addNotices" class="nav-link">
                        Notices
                        </a>
                    </li>
                    <li>
                        <a href="/image" class="nav-link">
                        Slug Images
                        </a>
                    </li>
                    <li>
                    <a href="{{ route('logout') }}" class="btn btn-danger"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                    </li>
                </ul>

            </div>
        </nav>
</body>
</html>