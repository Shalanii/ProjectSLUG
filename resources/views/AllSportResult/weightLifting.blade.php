@extends('welcome')

@section('content')

<div class="container">
<center><h3>WeightLifting Result Add</h3></center>
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
    <form method="post" action="/saveWeightLiftingResult">
        {{ csrf_field() }}
        <table class="table table-sm table-hover">
        <tr>
            <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
            <td>Match Number</td>
            <td><input type="number" name="MatchNo" min="1" max="999" placeholder="MatchNo" class="form-control">
                    @if ($errors->has('MatchNo'))
                   <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
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
                  </tr>
        <tr>
            <div class="form-group{{ $errors->has('WeightCategory') ? ' has-error' : '' }}">
            <td>WeightCategory</td>
            <td><select name="WeightCategory" class="form-control">
                    <option></option>
                    <option value="55KG">55KG</option>
                    <option value="61KG">61KG</option>
                    <option value="67KG">67KG</option>
                    <option value="73KG">73KG</option>
                    <option value="81KG">81KG</option>
                    <option value="89KG">89KG</option>
                    <option value="96KG">96KG</option>
                    <option value="102KG">102KG</option>
                    <option value="109KG">109KG</option>
                    <option value="109+KG">109+KG</option>

                </select>
                    @if ($errors->has('WeightCategory'))
                   <span class="help-block">
                        <strong>{{ $errors->first('WeightCategory') }}</strong>
                    </span>
                    @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('Uni') ? ' has-error' : '' }}">
            <td>Uni ID</td>
            <td><select name="Uni" class="form-control">
                        <option></option>
                    @foreach($uniIDarray as $data)
                        <option>{{$data->UniID}}</option>
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

        <tr>
            <div class="form-group{{ $errors->has('Player') ? ' has-error' : '' }}">  
            <td>Player</td>
            <td>
                <select name="Player" id="player1">
                    <option></option>
                  @foreach($player as $data)
                    <option value="{{$data->Name}}">{{$data->Name}}</option>
                  @endforeach
                </select>  
                    @if ($errors->has('Player'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Player') }}</strong>
                    </span>
                    @endif
            </td>
            </div>
		   		 <script>
		$(document).ready(function(){
			$('#player1').select2();
		});
	   </script>

            <div class="form-group{{ $errors->has('Snatch') ? ' has-error' : '' }}">
            <td>Snatch Max</td>
            <td><input type="text" name="Snatch" placeholder="weight" class="form-control">
                    @if ($errors->has('Snatch'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Snatch') }}</strong>
                    </span>
                    @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('Clean_Jerk') ? ' has-error' : '' }}">  
            <td>Clean & Jerk</td>
            <td><input type="text" name="Clean_Jerk" placeholder="weight" class="form-control">
                    @if ($errors->has('Clean_Jerk'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Clean_Jerk') }}</strong>
                    </span>
                    @endif
            </td>
            </div>
        </tr>
        <tr>
            <div class="form-group{{ $errors->has('Place') ? ' has-error' : '' }}">
            <td>Rank</td>
            <td><input type="text" name="Place" class="form-control">
                    @if ($errors->has('Place'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Place') }}</strong>
                    </span>
                    @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
            <td>Gender</td>
            <td><input type="radio" name="Gender" value="Men">Men
                <input type="radio" name="Gender" value="Women">Women
                @if ($errors->has('Gender'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Gender') }}</strong>
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
    <center><h3>WeightLifting Result View</h3></center>
  <div class="col-sm-12">
      <table class="table table-hover center">

          <tr>
              <th>Date</th>
              <th>MatchNo</th>
              <th>WeightCategory</th>
              <th>Uni</th>
	          <th>PlayerName</th>
              <th>Snatch Max</th>
              <th>Clean&Jerk Max</th>
              <th>TotalWeight</th>
              <th>Total</th>
              <th>Place</th>
              <th>Gender</th>
              <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->WeightCategory}}</td>
              <td>{{$task->Uni}}</td>
              <td>{{$task->PlayerName}}</td>  
	          <td>{{$task->Snatch}}</td>
              <td>{{$task->Clean_and_Jerk}}</td>
	          <td>{{$task->Total}}</td>
              <td>{{$task->Place}}</td>
              <td>{{$task->Gender}}</td>
              <td>
                  <a href="/deleteWeightLiftingResult/{{$task->Uni}}/{{$task->PlayerName}}" class="btn btn-sm btn-danger">Delete</a></td>
          </tr>
          @endforeach
      </table>
      </div>
</div>


@endsection