@extends('welcome')

@section('content')

<div class="container">
<center><h3>Volleyball Result Add</h3></center>
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
 
    <form method="post" action="/saveVolleyballResult" class="form-horizontal">
        {{ csrf_field() }}
        <div class="col-md-12">
            @if(isset($error))
              <div class="alert alert-success">
                <center><h5>{{$error}}</h5></center>       
              </div>
            @endif
          </div>
        <table class="table table-hover table-responsive">
        <tr>
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
            <div class="form-group{{ $errors->has('SportGroup') ? ' has-error' : '' }}">
            <td>Sport Group</td>
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
                    <option value="None">None</option>
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
            <div class="form-group{{ $errors->has('uni1') ? ' has-error' : '' }}">
            <td>Uni1 ID</td>
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
            <div class="form-group{{ $errors->has('uni1_wins') ? ' has-error' : '' }}">
            <td>Uni1 - Wins</td>
            <td><input type="number" name="uni1_wins" min="0" max="5" class="form-control">
                @if ($errors->has('Date'))
                   <span class="help-block">
                        <strong>{{ $errors->first('uni1_wins') }}</strong>
                    </span>
                @endif
            </td>
            </div>
            <div class="form-group{{ $errors->has('uni2') ? ' has-error' : '' }}">
            <td>Uni1 ID</td>
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
            <div class="form-group{{ $errors->has('uni2_wins') ? ' has-error' : '' }}">
            <td>Uni2 - Wins</td>
            <td><input type="number" name="uni2_wins" min="0" max="5" class="form-control">
                @if ($errors->has('uni2_wins'))
                   <span class="help-block">
                        <strong>{{ $errors->first('uni2_wins') }}</strong>
                    </span>
                @endif
            
            </td>
            </div>
            <tr><td><input type="submit" name="submit" value="ADD" class="btn btn-danger"></td></tr>
            </table>
            </form>
        </div>
    </div>
</div>
</div>
<div class="container">
<center><h3>Volleyball Result View</h3></center>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-hover table-responsive">

          <tr><th>Date</th>
              <th>Gender</th>
              <th>MatchNo</th>
              <th>Round</th>
              <th>SportGroup</th>
              <th>Uni1</th>
	          <th>Uni1 Wins</th>
              <th>Uni2</th>
              <th>Uni2 Wins</th>
              <th>Winner Team</th>
              <th>Action</th>
          </tr>
          @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->Gender}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->SportGroup}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni1_Wins}}</td>  
	          <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Wins}}</td>
              <td>{{$task->Winner}}</td>
              <td><a href="/deleteVolleyballResult/{{$task->MatchNo}}/{{$task->Gender}}/{{$task->Uni1}}/{{$task->Uni2}}" class="btn btn-danger btn-sm">Delete</a></td>  
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
</div>


@endsection