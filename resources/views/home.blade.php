@extends('layouts.app')
<style>
    .container{
        font-family: 'Lato', sans-serif;
    }
    .table{
        background-color:black;
        color:white;
    }
    .avatar{
        border-radius:100%;
        max-width:100px;
    }
    .panel-body{
        background-color:lightblue;
    }
    .panel-heading{
        background-color:#dc3545;
        color:black;
        font-size:18px;
    }
    p{
        color:black;
        size:12px;
    }
    
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Player Dashboard  
                    <a href="{{ route('logout') }}" class="btn btn-primary"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                </div> 
             
                <div class="panel-body">
                    <div class="col-md-4">
                        <img src="/img/user.png" class="avatar">
                    </div>
                   <div class="col-md-8">   
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif  
                        
                        <p><b>Name</b> :- {{Auth::user()->Name}}</p>               
                        <p><b>Nic</b> :- {{Auth::user()->nic}}</p>
                        <p><b>Sport</b> :- {{Auth::user()->Sport}}</p>
                        <p><b>UniID</b> :- {{Auth::user()->UniID}}</p>
                       
                    </div>
                    <h2>Match Schedule</h2>
                    <hr>
                    @if(count($schedule)>0)
			
                        <div class="table-responsive">
                        <table class="table table-bordered table-dark">
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Sport</th>
                                <th>Round</th>
                                <th>University1</th>
                                <th>University2</th>
                                <th>Venue</th>
                            </tr>
                        @foreach($schedule->all() as $schedule)
		
                            <tr>
                                <td>{{$schedule->Date}}</td>
                                <td>{{$schedule->Time}}</td>
                                <td>{{$schedule->Sport}}</td>
                                <td>{{$schedule->Round}}</td>
                                <td>{{$schedule->Uni1}}</td>
                                <td>{{$schedule->Uni2}}</td>
                                <td>{{$schedule->Venue}}</td>
                            </tr>
                        @endforeach
                    </table>
                    </div>
                    @endif
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
