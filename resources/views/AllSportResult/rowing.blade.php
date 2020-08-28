@extends('welcome')

@section('content')
<div class="container">
<center><h3>Rowing Result Add</h3></center>
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
    <form method="post" action="/saveRowingResult">
        {{ csrf_field()}}
        <table class="table table-responsive" align="center">
            <tr>
            <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                <td>Gender</td>
                <td><input type="radio" name="Gender" value="M">Men
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
            <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
            <td>Date</td>
            <td><input type="date" name="Date" class="form-control">
            @if ($errors->has('Date'))
                <span class="help-block">
                    <strong>{{ $errors->first('Date') }}</strong>
                </span>
            @endif
            </td>
            </div>
                       <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
            <td>MatchNo</td>
            <td><input type="number" name="MatchNo" class="form-control">
            @if ($errors->has('MatchNo'))
                <span class="help-block">
                    <strong>{{ $errors->first('MatchNo') }}</strong>
                </span>
            @endif
            </td>
            </div>
            </tr>
            <tr>
                <div class="form-group{{ $errors->has('MatchCategory') ? ' has-error' : '' }}">
                <td>Match Category</td>
                <td><select name="MatchCategory" class="form-control" id="types">
                        <option></option>
                        <option value="B Scull">B Scull</option>
                        <option value="B Pair">B Pair</option>
                        <option value="A Scull">A Scull</option>
                        <option value="B Four">B Four</option>
                        <option value="A Pair">A Pair</option>
                        <option value="A Four">A Four</option>
                    </select>
                    @if ($errors->has('MatchCategory'))
                    <span class="help-block">
                        <strong>{{ $errors->first('MatchCategory') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
                <div class="form-group{{ $errors->has('Uni') ? ' has-error' : '' }}">
                <td>Uni ID</td>
                <td><select name="Uni" class="form-control">
                            <option></option>
                        @foreach($uniID as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('Uni'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Uni') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#types').change(function(){
                        if($('#types').val()=='A Scull' || $('#types').val()=='B Scull'){
                            $('#player1').css('display','block');
                        }
                        else if($('#types').val()=='A Pair' || $('#types').val()=='B Pair'){
                            $('#player1').css('display','block');
                            $('#player2').css('display','block');
                        }
                        else if($('#types').val()=='B Four' || $('#types').val()=='A Four'){
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
                <div class="form-group{{ $errors->has('Player1') ? ' has-error' : '' }}">
                <td>Player1</td>
                <td>
                    <select name="Player1" style="display: none;" id="player1">
                            <option></option>
                            @foreach($player as $data)
                                <option value="{{$data->Name}}">{{$data->Name}}</option>
                            @endforeach
                    </select>    
                    @if($errors->has('Player1'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Player1') }}</strong>
                    </span>
                    @endif 
                </td>
                </div>
                <div class="form-group{{ $errors->has('Player2') ? ' has-error' : '' }}">
                <td>Player2</td>
                <td>
                    <select name="Player2" style="display: none;" id="player2">
                            <option></option>
                            @foreach($player as $data)
                                <option value="{{$data->Name}}">{{$data->Name}}</option>
                            @endforeach
                    </select> 
                    @if($errors->has('Player2'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Player2') }}</strong>
                    </span>
                    @endif  
                </td>
                </div>
            </tr>

            <tr>
                <div class="form-group{{ $errors->has('Player3') ? ' has-error' : '' }}">
                <td>Player3</td>
                <td>
                    <select name="Player3" style="display: none;" id="player3">
                            <option></option>
                            @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                            @endforeach
                    </select> 
                    @if($errors->has('Player3'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Player3') }}</strong>
                    </span>
                    @endif 
                </td>
                </div>
               <div class="form-group{{ $errors->has('Player4') ? ' has-error' : '' }}">
                <td>Player4</td>
                <td>
                    <select name="Player4"  style="display: none;" id="player4">
                            <option></option>
                            @foreach($player as $data)
                                <option value="{{$data->Name}}">{{$data->Name}}</option>
                            @endforeach
                    </select> 
                    @if($errors->has('Player4'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Player4') }}</strong>
                    </span>
                    @endif 
                </td>
                </div>
            </tr>
	   <script>
		$(document).ready(function(){
			$('#player1').select2();
			$('#player2').select2();
			$('#player3').select2();
			$('#player4').select2();
		});
	   </script>

            <tr>
                <div class="form-group{{ $errors->has('FinishTime') ? ' has-error' : '' }}">
                <td>FinishTime</td>
                <td><input type="text" name="FinishTime" class="form-control">
                    @if ($errors->has('FinishTime'))
                    <span class="help-block">
                        <strong>{{ $errors->first('FinishTime') }}</strong>
                    </span>
                    @endif 
                </td>
                </div>
                <div class="form-group{{ $errors->has('Rank') ? ' has-error' : '' }}">
                <td>Rank</td>
                <td><input type="text" name="Rank" class="form-control">
                    @if ($errors->has('Rank'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Rank') }}</strong>
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

    <div class="container">
    <center><h3>Rowing Result View</h3></center>
  <div class="col-sm-12">
      <table class="table table-hover table-responsive">

          <tr>
              <th>Date</th>
              <th>MatchNo</th>
              <th>Gender</th>
              <th>MatchCategory</th>
              <th>Uni1</th>
	          <th>Player 1</th>
              <th>Player 2</th>
              <th>Player 3</th>
	          <th>Player 4</th>
              <th>Time</th>
              <th>Rank</th>
              <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Gender}}</td>
              <td>{{$task->MatchCategory}}</td>
              <td>{{$task->Uni}}</td>
              <td>{{$task->Player1}}</td>
              <td>{{$task->Player2}}</td>
              <td>{{$task->Player3}}</td>  
	          <td>{{$task->Player4}}</td>
              <td>{{$task->FinishTime}}</td>
              <td>{{$task->Rank}}</td>  
              <td><a href="/deleteRowingResult/{{$task->Gender}}/{{$task->Uni}}/{{$task->MatchNo}}" class="btn btn-danger btn-sm">Delete</a></td>  
          </tr>
          @endforeach
      </table>
      </div>
</div>


@endsection