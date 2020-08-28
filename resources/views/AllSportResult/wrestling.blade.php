@extends('welcome')

@section('content')

<div class="container">
<center><h3>Wrestling Result Add</h3></center>
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
    <form method="post" action="/saveWrestlingResult">
        {{ csrf_field() }}
        <div class="col-md-12">
            @if(isset($error))
              <div class="alert alert-success">
                <center><h5>{{$error}}</h5></center>       
              </div>
            @endif
        </div>
        <table class="table table-sm table-hover">
        <tr>
        <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
            <td>Match Number</td>
            <td><input type="number" class="form-control" name="MatchNo" min="1" max="999">
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
        <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
            <td>Round</td>
            <td><select name="Round" class="form-control">
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
        <div class="form-group{{ $errors->has('WeightCategory') ? ' has-error' : '' }}">
            <td>WeightCategory</td>
            <td><select name="WeightCategory" class="form-control">
                    <option></option>
                    <option value="57KG">57KG</option>
                    <option value="61KG">61KG</option>
                    <option value="65KG">65KG</option>
                    <option value="70KG">70KG</option>
                    <option value="74KG">74KG</option>
                    <option value="79KG">79KG</option>
                    <option value="86KG">86KG</option>
                    <option value="92KG">92KG</option>
                    <option value="97KG">97KG</option>
                    <option value="125KG">125KG</option>

                </select>
                    @if ($errors->has('WeightCategory'))
                   <span class="help-block">
                        <strong>{{ $errors->first('WeightCategory') }}</strong>
                    </span>
                    @endif
            </td>
        </div>
        </tr>
        <tr>
        <div class="form-group{{ $errors->has('uni1') ? ' has-error' : '' }}">
            <td>Uni1</td>
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
        <div class="form-group{{ $errors->has('Uni1_Player') ? ' has-error' : '' }}">
            <td>Uni1 Player</td>
            <td>
                <select name="Uni1_Player" id="player1">
                    <option></option>
                  @foreach($player as $data)
                    <option value="{{$data->Name}}">{{$data->Name}}</option>
                  @endforeach
                </select>  
                @if ($errors->has('Uni1_Player'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Uni1_Player') }}</strong>
                    </span>
                @endif
            </td>
        </div>
        <div class="form-group{{ $errors->has('Uni1_Score') ? ' has-error' : '' }}">
            <td>University 1 - Score</td>
            <td><input type="number" name="Uni1_Score" class="form-control" min="0" max="10">
                    @if ($errors->has('Uni1_Score'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Uni1_Score') }}</strong>
                    </span>
                    @endif
            </td>
        </div>
        </tr>
        <tr>
        <div class="form-group{{ $errors->has('uni2') ? ' has-error' : '' }}">
            <td>Uni2</td>
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
	   <script>
		$(document).ready(function(){
			$('#player1').select2();
			$('#player2').select2();
		});
	   </script>

        <div class="form-group{{ $errors->has('Uni2_Player') ? ' has-error' : '' }}">
            <td>Uni2 Player</td>
            <td>
                <select name="Uni2_Player" id="player2">
                    <option></option>
                  @foreach($player as $data)
                    <option value="{{$data->Name}}">{{$data->Name}}</option>
                  @endforeach
                </select> 
                    @if ($errors->has('Uni2_Player'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Player') }}</strong>
                    </span>
                    @endif
            </td>
        </div>
        <div class="form-group{{ $errors->has('Uni2_Score') ? ' has-error' : '' }}">
            <td>University 1 - Score</td>
            <td><input type="number" class="form-control" name="Uni2_Score" min="0" max="10">
                    @if ($errors->has('Uni2_Score'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Score') }}</strong>
                    </span>
                    @endif
            </td>
        </div>
        </tr>
        <tr><td><input type="submit" name="submit" value="SAVE" class="btn btn-primary"></td></tr>
    </table>
    </form>
    </div>
    </div>
    </div>
    </div>

    <div class="container">
    <center><h3>WrestLing Result View</h3></center>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-hover table-responsive">

          <tr>
              <th>Date</th>
              <th>MatchNo</th>
              <th>Round</th>
              <th>WeightCategory</th>
              <th>Uni1</th>
	          <th>Uni1 Player</th>
              <th>Uni1 Score</th>
              <th>Uni2</th>
              <th>Uni2 Player</th>
              <th>Uni2 Score</th>
              <th>Winner</th>
              <th>Action</th>
          </tr>
          @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->WeightCategory}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni1_Player}}</td>  
	          <td>{{$task->Uni1_Score}}</td>
	          <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Player}}</td>  
              <td>{{$task->Uni2_Score}}</td>
              <td>{{$task->Winner}}</td>
              <td>
                  <a href="/deleteWrestlingResult/{{$task->MatchNo}}" class="btn btn-sm btn-danger">Delete</a></td>  
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
</div>


@endsection