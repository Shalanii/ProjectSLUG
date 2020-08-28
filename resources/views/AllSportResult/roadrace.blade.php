@extends('welcome')

@section('content')
<center><h3>Road Race Result Add</h3></center>
<div class="x"> 
<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <?php //form Validation ?>
        <form action="/saveRoadraceResult" method="post">
          {{csrf_field()}}
        <div class="row">
        <div class="col-md-4">
            <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">  
            <label>Date</label>
                  <input type="date" name="Date" class="form-control">
                    @if ($errors->has('Date'))
                      <span class="help-block">
                        <strong>{{ $errors->first('Date') }}</strong>
                      </span>
                    @endif
              </div>
          </div>
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('UniID') ? ' has-error' : '' }}">  
                <label>Uni ID</label>
                <select name="UniID" class="browser-default custom-select" class="form-control" >
                    <option></option>
                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                  @endforeach
                </select>
                    @if ($errors->has('UniID'))
                      <span class="help-block">
                        <strong>{{ $errors->first('UniID') }}</strong>
                      </span>
                    @endif
              </div>
            </div>  
            <div class="col-md-4">
            <div class="form-group{{ $errors->has('PlayerName') ? ' has-error' : '' }}">
              <label>Player Name</label>
                <select name="PlayerName" id="player1">
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
            </div>
            </div>
		   		 <script>
		$(document).ready(function(){
			$('#player1').select2();
		});
	   </script>

        </div>  
        <div class="row">
          <div class="col-md-4">
            <div class="form-group{{ $errors->has('Time') ? ' has-error' : '' }}">
            <label>FinishTime</label>
              <input type="text" name="Time" class="form-control">
              @if ($errors->has('Time'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Time') }}</strong>
                  </span>
              @endif 
            </div>
          </div>   
          <div class="col-md-4">
            <div class="form-group{{ $errors->has('Rank') ? ' has-error' : '' }}">
            <label>Rank</label>
              <input type="text" name="Rank" class="form-control">
              @if ($errors->has('Rank'))
                  <span class="help-block">
                    <strong>{{ $errors->first('Rank') }}</strong>
                  </span>
              @endif 
            </div>
          </div>
        </div>
        <input type="submit" name="submit" value="SAVE" class="btn btn-danger">
        </form>
        
    </div>
  </div>
</div>
</div>
</div>
<br><br>

<div class="x"> 
<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-hover table-responsive">
          <tr><th>Date</th>
              <th>Uni ID</th>
              <th>Player Name</th>
              <th>FinishTime</th>
              <th>Rank</th>
	            <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->Uni}}</td>
              <td>{{$task->PlayerName}}</td>
              <td>{{$task->Time}}</td>
              <td>{{$task->Rank}}</td>
              <td>
                  <a href="/deleteRoadraceResult/{{$task->Uni}}/{{$task->PlayerName}}" class="btn btn-danger btn-sm">Delete</a></td>   
          </tr>
          @endforeach
      </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
