@extends('welcome')

@section('content')
<center><h3>Rugby Football Result Add</h3></center>
<div class="x"> 
<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <?php //form Validation ?>
        <form action="/saveRugbyFootballResult" method="post">
          {{csrf_field()}}
          <div class="col-md-12">
            @if(isset($error))
              <div class="alert alert-success">
                <center><h5>{{$error}}</h5></center>       
              </div>
            @endif
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
              <label>Date</label>
                <input type="date" name="Date"  class="form-control">
                @if ($errors->has('Date'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Date') }}</strong>
                    </span>
                @endif
              </div>
            </div>
                       <div class="col-md-2">
              <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
              <label>MatchNo</label>
                <input type="text" name="MatchNo"  class="form-control" placeholder="Match No">
                @if ($errors->has('MatchNo'))
                   <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
              <label>Round</label>
		          <select name="Round" class="browser-default custom-select" class="form-control">
                  <option></option>
			            <option>Preliminary-Round</option>
			            <option>Quarter-final</option>
			            <option>Semi-final</option>
                  <option>Consolation Finals</option>
			            <option>Final</option>
		          </select>
                @if ($errors->has('Round'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Round') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group{{ $errors->has('SportGroup') ? ' has-error' : '' }}">
              <label>SportGroup</label>
                <select name="SportGroup" class="browser-default custom-select" class="form-control" >
                    <option></option>
                    <option>A</option>
			              <option>B</option>
			              <option>C</option>
			              <option>D</option>
                    <option>P</option>
			              <option>Q</option>
			              <option>R</option>
			              <option>S</option>
                    <option>X</option>
			              <option>Y</option>
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
              <div class="form-group{{ $errors->has('Uni1') ? ' has-error' : '' }}">
                <label>Uni 1</label>
                <select name="Uni1" class="browser-default custom-select" class="form-control" >
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
              </div>
            </div>  
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Uni1_Score') ? ' has-error' : '' }}">
              <label>Uni1 Score</label>
		          <input type="number" name="Uni1_Score" class="form-control input-sm">
                @if ($errors->has('Uni1_Score'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Uni1_Score') }}</strong>
                    </span>
                @endif
              </div>
            </div> 
          <div class="col-md-3">
            <div class="form-group{{ $errors->has('Uni2') ? ' has-error' : '' }}">  
              <label>Uni 2</label>
                <select name="Uni2" class="browser-default custom-select" class="form-control" >
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
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group{{ $errors->has('Uni2_Score') ? ' has-error' : '' }}">
            <label>Uni2 Score</label>
		          <input type="number" name="Uni2_Score" class="form-control input-sm">
              @if ($errors->has('Uni2_Score'))
                   <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Score') }}</strong>
                    </span>
                @endif
            </div>   
          </div>
          </div>
          <div class="row">
                  <div class="col">
                    <input type="submit"  class="btn btn-primary" value="ADD">
                </div>
          </div>
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
              <th>Match No</th>
              <th>Round</th>
              <th>Sport Group</th>
              <th>Uni1</th>
              <th>Uni1_Score</th>
              <th>Uni2</th>
	            <th>Uni2_Score</th>
              <th>Winner Team</th>
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
              <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Score}}</td>  
              <td>{{$task->Winner}}</td> 
              <td>
                  <a href="/deleterugbyFootballResult/{{$task->MatchNo}}" class="btn btn-sm btn-danger">Delete</a></td>   
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
