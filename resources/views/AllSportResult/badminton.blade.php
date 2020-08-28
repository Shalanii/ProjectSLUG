@extends('welcome')

@section('content')

<div class="container">
  <center><h3>Badminton Result Add</h3></center>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/saveBadmintonResult" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        @if(isset($error))
                            <div class="alert alert-success">
                            <center><h5>{{$error}}</h5></center>       
                            </div>
                        @endif
                    </div>
                   
                    <div class="row">
                        <div class="col-md-4">
                        <label>Date</label>
                            <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                                    <input type="date" name="Date" class="form-control">
                                    @if ($errors->has('Date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Date') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                        <label class="col-md-4 control-label">Gender</label>
                            <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                                    <input type="radio" name="Gender" value="Men">Men
                                    <input type="radio" name="Gender" value="Women">Women
                                    @if ($errors->has('Gender'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Gender') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">     
                            <div class="col-md-4">
                            <label>Match Number</label>
                                <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
                                    <input type="number" name="MatchNo" min="1" max="999" class="form-control">
                                    @if ($errors->has('MatchNo'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('MatchNo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        <div class="col-md-4">
                            <label>Round</label>
                                <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
                                    <select name="Round" class="form-control" >
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
                                </div>
                        </div>
                        <div class="col-md-4">
                        <label>Sport Group</label>
                            <div class="form-group{{ $errors->has('SportGroup') ? ' has-error' : '' }}">
                                
                                <select name="SportGroup" class="form-control">
                                    <option></option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="P">P</option>
                                    <option value="Q">Q</option>
                                    <option value="R">R</option>
                                    <option value="S">S</option>
                                    <option value="X">Y</option>
                                    <option value="Y">Y</option>
                                    <option value="None">None</option>
                                </select>
                                    @if ($errors->has('SportGroup'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('SportGroup') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <label>UniID2</label>
                            <div class="form-group{{ $errors->has('uni1') ? ' has-error' : '' }}">
                                
                                    <select name="uni1" class="form-control">
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
                            </div>
                        </div>
                        <div class="col-md-3">
                        <label>University 1 - Wins</label>
                            <div class="form-group{{ $errors->has('uni1_wins') ? ' has-error' : '' }}">
                                
                                <input type="number" name="uni1_wins" min="0" max="5" class="form-control">
                                    @if ($errors->has('uni1_wins'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uni1_wins') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                        <label>UniID2</label>
                            <div class="form-group{{ $errors->has('uni2') ? ' has-error' : '' }}">
                               
                                    <select name="uni2" class="form-control">
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
                            </div>
                        </div>
                        <div class="col-md-3">
                        <label>University 2 - Wins</label>
                            <div class="form-group{{ $errors->has('uni2_wins') ? ' has-error' : '' }}">       
                                <input type="number" name="uni2_wins" min="0" max="5" class="form-control">
                                    @if ($errors->has('uni2_wins'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('uni2_wins') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                    </div>
            <div class="row">
                <div class="col">
                    <input type="submit" class="btn btn-primary" value="ADD">
                </form>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
<center><h3>Badminton Result View</h3></center>
 @if(Session()->has('msg')) 
        		<div class="alert alert-success alert-block">
          			<button type="button" class="close" data-dismiss="alert">�</button>
             			<strong>{{Session()->get('msg')}}</strong>
        		</div>
    		    @endif
		

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
              <td><a href="/deleteBadmintonResult/{{$task->MatchNo}}/{{$task->Gender}}" class="btn btn-danger btn-sm">Delete</a></td>  
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
</div>
@endsection