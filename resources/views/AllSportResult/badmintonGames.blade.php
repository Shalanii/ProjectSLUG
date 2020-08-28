@extends('welcome')

@section('content')


<div class="container">
<center><h3>Badminton Games Result Add</h3></center>
<div class="row">
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
        <div class="col-md-12">
            @if(isset($error))
              <div class="alert alert-success">
                <center><h5>{{$error}}</h5></center>       
              </div>
            @endif
        </div>
     
    <form method="post" action="/saveBadmintonGamesResult">
        {{ csrf_field()}}
        <table class="table table-sm table-hover">
            <tr>
                <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                <td colspan="2">Gender</td>
                <td colspan="2"><input type="radio" name="Gender" value="M">Men
                    <input type="radio" name="Gender" value="W">Women
                    @if ($errors->has('Gender'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Gender') }}</strong>
                    </span>
                    @endif    
                </td>
                </div>
            </tr>

            <tr>
                <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
                <td colspan="2">Match Number</td>
                <td  colspan="2"><input type="number" name="MatchNo" min="1" max="999" class="form-control">
                    @if ($errors->has('MatchNo'))
                   <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>

            <tr>
                <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
                <td colspan="2">Round</td>
                <td colspan="2"><select name="Round" class="form-control">
                        <option></option>
                        <option value="Preliminary">Preliminary</option>
                        <option value="Quarter Finals">Quarter Finals</option>
                        <option value="Semi Finals">Semi Finals</option>
                        <option value="Consolation Finals">Consolation Finals</option>
                        <option value="Finals">Finals</option>
                    </select>
                    @if ($errors->has('Round'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Round') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>

            <tr>
                <div class="form-group{{ $errors->has('MatchCategory') ? ' has-error' : '' }}">
                <td colspan="2">Match Category</td>
                <td colspan="2"><select id="types" name="MatchCategory" class="form-control">
                        <option></option>
                        <option value="1st Single">1st Single</option>
                        <option value="2nd Single">2nd Single</option>
                        <option value="3rd Single">3rd Single</option>
                        <option value="1st Double">1st Double</option>
                        <option value="2nd Double">2nd Double</option>
                    </select>
                    @if ($errors->has('MatchCategory'))
                   <span class="help-block">
                        <strong>{{ $errors->first('MatchCategory') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>
            <tr>
                <div class="form-group{{ $errors->has('uni1') ? ' has-error' : '' }}">
                <td>University - 1 Name</td>
                <td><select name="uni1" class="form-control">
                            <option></option>
                        @foreach($uniIDarray as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('uni1'))
                   <span class="help-block">
                        <strong>{{ $errors->first('uni1') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
                <div class="form-group{{ $errors->has('uni2') ? ' has-error' : '' }}">
                <td>University - 2 Name</td>
                <td><select name="uni2" class="form-control">
                            <option></option>
                        @foreach($uniIDarray as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('uni2'))
                   <span class="help-block">
                        <strong>{{ $errors->first('uni2') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>
            
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#types').change(function(){
                        if($('#types').val()=='1st Single' || $('#types').val()=='2nd Single' || $('#types').val()=='3rd Single'){
                            $('#player1').css('display','block');
                            $('#player2').css('display','block');
                        }
                        else if($('#types').val()=='1st Double' || $('#types').val()=='2nd Double'){
                            $('#player1').css('display','block');
                            $('#player2').css('display','block');
                            $('#player3').css('display','block');
                            $('#player4').css('display','block');
                        }
                        else{
                            $('#player1').css('display','none');
                            $('#player2').css('display','none');
                            $('#player3').css('display','none');
                            $('#player4').css('display','none');
                            
                        }
                    });
                });
            </script>   
            <tr>
                <div class="form-group{{ $errors->has('u1p1') ? ' has-error' : '' }}">
                <td>Uni1 Player1</td>
                 <td>  
			 <select id="player1" style="display: none;" name="u1p1">
                            <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('u1p1'))
                   <span class="help-block">
                        <strong>{{ $errors->first('u1p1') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
          		 <script>
		$(document).ready(function(){
			$('#player1').select2();
			$('#player2').select2();
			$('#player3').select2();
			$('#player4').select2();
		});
	   </script>

                <div class="form-group{{ $errors->has('u2p1') ? ' has-error' : '' }}"> 
                    <td>Uni2 Player1</td>
                   <td> <select id="player2" style="display: none;" name="u2p1" >
                            <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('u2p1'))
                   <span class="help-block">
                        <strong>{{ $errors->first('u2p1') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>

            <tr>
                <div class="form-group{{ $errors->has('u1p2') ? ' has-error' : '' }}">
                <td>Uni1 Player2</td>
                   <td> <select id="player3" style="display: none;" name="u1p2">
                            <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('u1p2'))
                   <span class="help-block">
                        <strong>{{ $errors->first('u1p2') }}</strong>
                    </span>
                    @endif
                </td>
        
                </div>
                <div class="form-group{{ $errors->has('u2p2') ? ' has-error' : '' }}">
                <td>Uni2 Player2</td>
                   <td> <select id="player4" style="display: none;" name="u2p2">
                            <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('u2p2'))
                   <span class="help-block">
                        <strong>{{ $errors->first('u2p2') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>

            <tr>
                <div class="form-group{{ $errors->has('points1') ? ' has-error' : '' }}">
                <td>Uni1 Points</td>
                <td><input type="number" name="points1" min="0" max="50" class="form-control">
                    @if ($errors->has('points1'))
                   <span class="help-block">
                        <strong>{{ $errors->first('points1') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
                <div class="form-group{{ $errors->has('points2') ? ' has-error' : '' }}">
                <td>Uni2 Points</td>
                <td><input type="number" name="points2" min="0" max="50" class="form-control">
                    @if ($errors->has('points2'))
                   <span class="help-block">
                        <strong>{{ $errors->first('points2') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>
            <tr><td><input type="submit" name="submit" value="SAVE" class="btn btn-danger"></td></tr>
        </table>
    </form>
    </div>
    </div>
    </div>
    </div>
</div>
    <div class="container">
    <center><h3>Badminton Result View</h3></center>
  <div class="col-sm-12">
      <table class="table table-hover table-sm">

          <tr><th>Gender</th>
              <th>Round</th>
              <th>MatchNo</th>
              <th>MatchCategory</th>
              <th>Uni1 Player1</th>
              <th>Uni1 Player2</th>
              <th>Uni1</th>
	          <th>Uni1_Points</th>
              <th>Uni2 Player1</th>
	          <th>Uni2 Player2</th>
              <th>Uni2</th>
              <th>Uni2_Points</th>
              <th>Action</th>
          </tr>
        @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Gender}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->MatchCategory}}</td>
              <td>{{$task->Uni1_P1}}</td>
              <td>{{$task->Uni1_P2}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni1_Points}}</td>  
              <td>{{$task->Uni2_P1}}</td>
              <td>{{$task->Uni2_P2}}</td>  
	          <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Points}}</td>
              <td>
                  <a href="/deleteBadmintonGamesResult/{{$task->MatchNo}}/{{$task->Gender}}/{{$task->MatchCategory}}" class="btn btn-danger">Delete</a></td>  
          </tr>
          @endforeach
          @endif
         
        
      </table>
      </div>
</div>


@endsection