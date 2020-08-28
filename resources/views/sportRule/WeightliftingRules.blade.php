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
    <title>Weightlifting Rules</title>


</head>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(document).scroll(function(){
            $('.navbar').toggleClass('scrolled',$(this).
            scrollTop()>$('.navbar').height());
        });
    </script>
    <style>
	.ftco-animate .text-center{

	position:relative;
	top:45px;
}

         body{
            color:#ffcccc;
            font-family: tahoma !important;
            }
        .list-group-item{
            color:black;
        }
    </style>

        @include('home.Navbar')
<body>
<section class="blog2">
<div class="heading-section ftco-animate">
	        <h2 class="mb-4 text-center">WeightLifting Rules & Regulations</h2>
	    </div><br><br>
<div  style="border-style: solid;border-width: 5px;margin: 30px; padding:50px;color:#eeddee">


    <b>1.	Date & Venue</b><br>
    From 6th July 2019 onward<br>
    At BOI Ground – Koggala, University of Colombo and University of Peradeniya.<br><br>

    <b>2.	Rules and Regulations</b><br>

    2.1	The competition will be conducted in accordance with the rules and regulations of the International
    Rugby Football board (IRB), Sri Lanka Rugby football Union (SLRFU) as adopted by the Sri Lanka
    University Sports Association (SLUSA).<br>

    2.2	Each team may register maximum 30 players for the team. However they should declare 23
    players 30 minutes before starting the each match. Only those 23 players are entitled to play in
    that particular match and sit at the bench.<br>

    2.3	The event is played as preliminary group matches as drawn by the SLUSA (Four Groups) and
    followed by Knocked out matches among 2 top teams of each groups as the schedule.<br>

    2.4	Time & Duration<br>
    I.	The duration of all matches till the semifinals will be 30 minutes. Each way with an interval of 05 minutes.<br>
    II.	The duration of Final & Consolation Final matches will be played 35 minutes each way with an interval
    of 05 minutes.<br><br>

    <b>3.	Points and ranking</b><br>

    The following system will be adopted for selection of teams for Quarter Final.<br>
    3.1	. The following points shall be taken in-to account to decide the ranking of Preliminaries.<br>
<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <tr>
            <th>Ranking</th>
            <th>Points</th>
        </tr>

        <tr>
            <td>Match Won</td>
            <td>03</td>
        </tr>

        <tr>
            <td>Match Lost</td>
            <td>01</td>
        </tr>

        <tr>
            <td>Match Forfeited</td>
            <td>00</td>
        </tr>
    </table>
    </div><br>




    3.2	In the event of score being level at the end of the full time of any match 03penalties (22 meters)
    will be awarded.<br><br>



    <b>4.	Technical Commission</b>
    <ul>
        <li>Mr. P.N Weerasinhe (Secretary General/SLUSA) - Chairman</li>
        <li>Mr. Anuja Mallawaarchchi (Subcommittee Chairman/SLUSA)</li>
        <li>SLRFU – Representative</li>
        <li>Mr. P.K.S Chandana (Organizing Secretary)</li>
        <li>Mr. G.L Wijesuriya</li>
        <li>Mr. Wickramanayake</li>
    </ul>


    <b>5.	 Jury of Appeal</b>
    <ul>
        <li>Dr.P.S.C Subash Jayasinghe (SAB Member) - Chairman</li>
        <li>Mr. P.N Weerasinhe (Sectary General/SLUSA)</li>
        <li>Mr. Anuja Mallawaarchchi (Subcommittee Chairman/SLUSA)</li>
        <li>SLRFU – Representative</li>
        <li>Mr. P.K.S Chandana (Organizing Secretary)</li>
    </ul>

</div>
    </section>
    @include('footer.footer')
</body>
</html>
