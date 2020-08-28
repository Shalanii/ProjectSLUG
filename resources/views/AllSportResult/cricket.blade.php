@extends('welcome')

@section('content')

<div class="container">
<center><h3>Cricket Result Add</h3></center>
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
    <form method="post" action="/saveCricketResult">
    {{csrf_field()}}
        <div class="col-md-12">
            @if(isset($error))
                <div class="alert alert-success">
                    <center><h5>{{$error}}</h5></center>       
                </div>
            @endif
        </div>
    <table class ="table table-hover table-sm" align="center">
        <tr>
        <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
            <td>Match Number</td>
            <td><input type="number" name="MatchNo" class="form-control" min="1" max="999" placeholder="MatchNo">
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
                    <option value="Quarter Final">Quarter Final</option>
                    <option value="Semi Final">Semi Final</option>
                    <option value="Consolation Final">Consolation Final</option>
                    <option value="Final">Final</option>
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
            <div class="form-group{{ $errors->has('SportGroup') ? ' has-error' : '' }}">
            <td>SportGroup</td>
            <td><select name="SportGroup" class="form-control">
                    <option></option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="P">P</option>
                    <option value="Q">Q</option>
                    <option value="R">R</option>
                    <option value="S">S</option>
                    <option value="X">X</option>
                    <option value="Y">Y</option>
                </select>
                @if ($errors->has('SportGroup'))
                <span class="help-block">
                    <strong>{{ $errors->first('SportGroup') }}</strong>
                </span>
                @endif
            </td>
            </div>
        </tr>
        <tr>
            <div class="form-group{{ $errors->has('Uni1') ? ' has-error' : '' }}">
            <td>UniID Team1</td>
            <td><select name="Uni1" class="form-control">
                        <option></option>
                    @foreach($uniIDarray as $data)
                        <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Uni1'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni1') }}</strong>
                </span>
                @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('Uni2') ? ' has-error' : '' }}">
            <td>UniID Team2</td>
            <td><select name="Uni2" class="form-control">
                        <option></option>
                    @foreach($uniIDarray as $data)
                        <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Uni2'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni2') }}</strong>
                </span>
                @endif
            </td>
            </div>
        </tr>

        <tr>   
            <div class="form-group{{ $errors->has('Uni1_Score') ? ' has-error' : '' }}">
            <td>Uni1 Score</td>
            <td><input type="number" class="form-control" name="Uni1_Score" placeholder="Uni1 Score">
                @if ($errors->has('Uni1_Score'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni1_Score') }}</strong>
                </span>
                @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('Uni2_Score') ? ' has-error' : '' }}">
            <td>Uni2 Score</td>
            <td><input type="number" class="form-control" name="Uni2_Score" placeholder="Uni2 Score">
                @if ($errors->has('Uni2_Score'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni2_Score') }}</strong>
                </span>
                @endif
            </td>
            </div>
        </tr>
        <tr>
            <div class="form-group{{ $errors->has('Uni1_Wickets') ? ' has-error' : '' }}">    
            <td>Uni1 Wickets</td>
            <td><input type="number" class="form-control" name="Uni1_Wickets" placeholder="Uni1 Wickets">
                @if ($errors->has('Uni1_Wickets'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni1_Wickets') }}</strong>
                </span>
                @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('Uni2_Wickets') ? ' has-error' : '' }}">  
            <td>Uni2 Wickets</td>
            <td><input type="number" class="form-control" name="Uni2_Wickets" placeholder="Uni2 Wickets">
                @if ($errors->has('Uni2_Wickets'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni2_Wickets') }}</strong>
                </span>
                @endif
            </td>
            </div>
        </tr>
        <tr> 
            <div class="form-group{{ $errors->has('Uni1_Overs') ? ' has-error' : '' }}">    
            <td>Uni1 Overs</td>
            <td><input type="text" class="form-control" name="Uni1_Overs" placeholder="Uni1 Overs">
                @if ($errors->has('Uni1_Overs'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni1_Overs') }}</strong>
                </span>
                @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('Uni2_Overs') ? ' has-error' : '' }}"> 
            <td>Uni2 Overs</td>
            <td><input type="text" class="form-control" name="Uni2_Overs" placeholder="Uni2 Overs">
                @if ($errors->has('Uni2_Overs'))
                <span class="help-block">
                    <strong>{{ $errors->first('Uni2_Overs') }}</strong>
                </span>
                @endif
            </td>
            </div>
        </tr>
        <tr>
            <div class="form-group{{ $errors->has('Result_Description') ? ' has-error' : '' }}"> 
            <td>Result Description</td>
            <td><input type="text" class="form-control" name="Result_Description" placeholder="Result Description">
                @if ($errors->has('Result_Description'))
                <span class="help-block">
                    <strong>{{ $errors->first('Result_Description') }}</strong>
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

<div class="container">
<center><h3>Cricket Result View</h3></center>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-sm table-hover table-responsive">
          <tr>
              <th>Date</th>
              <th>MatchNo</th>
              <th>Round</th>
              <th>SportGroup</th>
	          <th>Uni1</th>
              <th>Uni1 Score</th>
              <th>Uni1 Wickets</th>
              <th>Uni1 Overs</th>
              <th>Uni2</th>
              <th>Uni2 Score</th>
              <th>Uni2 Wickets</th>
              <th>Uni2 Overs</th>
              <th>Result Description</th>
              <th>Action</th>
          </tr>
          @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->SportGroup}}</td>
              <td>{{$task->Uni1}}</td>  
	          <td>{{$task->Uni1_Score}}</td>
              <td>{{$task->Uni1_Wickets}}</td>
	          <td>{{$task->Uni1_Overs}}</td>
              <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Score}}</td>
              <td>{{$task->Uni2_Wickets}}</td>
              <td>{{$task->Uni2_Overs}}</td>
              <td>{{$task->Result_Description}}</td>
              <td><a href="/deleteCricketResult/{{$task->MatchNo}}" class="btn btn-danger btn-sm">Delete</a></td>
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
</div>


@endsection