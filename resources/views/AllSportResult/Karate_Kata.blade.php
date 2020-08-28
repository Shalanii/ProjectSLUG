@extends('welcome')

@section('content')

<div class="container">
<center><h3>Karate Kata Games Result Add</h3></center>
<div class="row">
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
    <form method="post" action="/saveKarateKataResult">
        {{ csrf_field() }}
        <table class="table table-stripted">
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
                <td>Match Number</td>
                <td><input type="number" name="MatchNo" min="1" max="999" class="form-control">
                    @if ($errors->has('MatchNo'))
                   <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>
            <tr>
                <div class="form-group{{ $errors->has('Team_Individual') ? ' has-error' : '' }}">
                <td>Teams/Individual</td>
                <td><select id="types" name="Team_Individual" class="form-control">
                        <option></option>
                        <option value="Individual">Individual</option>
                        <option value="Team">Team</option>
                    </select>
                    @if ($errors->has('Team_Individual'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Team_Individual') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
                <div class="form-group{{ $errors->has('uni') ? ' has-error' : '' }}"> 
                <td>University</td>
                <td><select name="uni" class="form-control">
                             <option></option>
                        @foreach($uniIDarray as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('uni'))
                   <span class="help-block">
                        <strong>{{ $errors->first('uni') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
            </tr>
            <tr>
              
                <div class="form-group{{ $errors->has('PlayerName') ? ' has-error' : '' }}">
                <td>PlayerName</td>
                <td>
                    <select name="PlayerName" id="player1" style="display: none;">
                             <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('PlayerName'))
                   <span class="help-block">
                        <strong>{{ $errors->first('PlayerName') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
		   		 <script>
		$(document).ready(function(){
			$('#player1').select2();
			$('#player2').select2();
			$('#player3').select2();
		});
	   </script>

                <div class="form-group{{ $errors->has('PlayerName1') ? ' has-error' : '' }}">
                <td>PlayerName1</td>
                <td>
                    <select name="PlayerName1" id="player2" style="display: none;">
                             <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('PlayerName1'))
                   <span class="help-block">
                        <strong>{{ $errors->first('PlayerName2') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
             
                         
            </tr>
            <tr>  
		   <div class="form-group{{ $errors->has('PlayerName3') ? ' has-error' : '' }}">
                <td>PlayerName2</td>
                <td>
                    <select name="PlayerName2" id="player3" style="display: none;">
                             <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('PlayerName3'))
                   <span class="help-block">
                        <strong>{{ $errors->first('PlayerName3') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
		<div class="form-group{{ $errors->has('points') ? ' has-error' : '' }}">
                <td>Points</td>
                <td><input type="text" name="points" class="form-control">
                    @if ($errors->has('points'))
                   <span class="help-block">
                        <strong>{{ $errors->first('points') }}</strong>
                    </span>
                    @endif
                </td> 
                </div> 
            </tr>

            <tr><td><input type="submit" name="submit" value="ADD" class="btn btn-danger"></td></tr>
        </table>
    </form>
</div>
</div>
</div>
</div>
</div>
<br><br>
<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-hover table-sm">

          <tr><th>Date</th>
              <th>Gender</th>
              <th>MatchNo</th>
              <th>Team_Individual</th>
	          <th>Uni</th>
              <th>PlayerName</th>
              <th>PlayerName1</th>
              <th>PlayerName2</th>
              <th>Points</th>
              <th>Action</th>
          </tr>
          @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->Gender}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Team_Individual}}</td>
              <td>{{$task->Uni}}</td>
              <td>{{$task->PlayerName}}</td>  
              <td>{{$task->PlayerName1}}</td> 
              <td>{{$task->PlayerName2}}</td> 
	          <td>{{$task->Points}}</td>
              <td>
                  <a href="/deleteKarateKataResult/{{$task->MatchNo}}/{{$task->Gender}}/{{$task->Team_Individual}}" class="btn btn-danger btn-sm">Delete</a></td>  
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
</div>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#types').change(function(){
                        if($('#types').val()=='Individual'){
                            $('#player').css('display','block');
                        }
                        else if($('#types').val()=='Team'){
                            $('#player').css('display','block');
                            $('#player1').css('display','block');
                            $('#player2').css('display','block');
                        }
                        else{
                            $('#player').css('display','none');
                        }
                    });
                });
            </script>



@endsection