@extends('welcome')
@include('AdminResultView.adminhome')
@section('content')
<center><h3>Event Schedule Add</h3></center>
<hr>
<div class="container">
  <div class=" col-sm-12">
    <div class="card">
      <div class="card-body">
        <form action="/saveEvents" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('matchNo') ? ' has-error' : '' }}">
                <label>Match No</label>
                <input type="text" name="matchNo"  class="form-control input-sm" placeholder="Match No">
                @if ($errors->has('matchNo'))
                    <span class="help-block">
                      <strong>{{ $errors->first('matchNo') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('uniid1') ? ' has-error' : '' }}">
                <label>Uni 1</label>
                <select name="uniid1" class="form-control" >
                    <option></option>
                    @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                    @endforeach
                </select>
                @if ($errors->has('uniid1'))
                    <span class="help-block">
                      <strong>{{ $errors->first('uniid1') }}</strong>
                    </span>
                @endif

              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('uniid2') ? ' has-error' : '' }}">
                <label>Uni 2</label>
                <select name="uniid2" class="form-control" >
                    <option></option>
                    @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                    @endforeach
                </select>
                @if ($errors->has('uniid2'))
                    <span class="help-block">
                      <strong>{{ $errors->first('uniid2') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                <label>Sport Group</label>
                <select name="group" class="form-control">
                  <option></option>
                  <option>A</option>
                  <option>B</option>
                  <option>C</option>
                  <option>D</option>
                  <option>p</option>
                  <option>Q</option>
                  <option>R</option>
                  <option>S</option>
                  <option>X</option>
                  <option>Y</option>
		            </select>
                @if ($errors->has('group'))
                    <span class="help-block">
                      <strong>{{ $errors->first('group') }}</strong>
                    </span>
                @endif
              </div>
            </div>    
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('round') ? ' has-error' : '' }}">
                <label>Round</label>
		            <select name="round" class="form-control">
                                    <option></option>
			            <option>Preliminary Round</option>
			            <option>Heats</option>
			            <option>Quarter-Finals</option>
			            <option>Semi Final</option>
                  		    <option>Consolation Finals</option>
			            <option>Final</option>
		            </select>
                @if ($errors->has('round'))
                    <span class="help-block">
                      <strong>{{ $errors->first('round') }}</strong>
                    </span>
                @endif
              </div>
            </div>  
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Sport') ? ' has-error' : '' }}">
                  <label>Sport</label>
                  <select name="Sport" class="form-control" >
                    <option></option>
                    @foreach($groupNo as $data)
                    <option value="{{$data->Sport}}">{{$data->Sport}}</option>
                    @endforeach
                </select>
                @if ($errors->has('Sport'))
                    <span class="help-block">
                      <strong>{{ $errors->first('Sport') }}</strong>
                    </span>
                @endif
              </div>
            </div>   
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}"> 
                <label>Date</label> 
               	<input type="date" name="date" class="form-control input-sm">
                 @if ($errors->has('date'))
                    <span class="help-block">
                      <strong>{{ $errors->first('date') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}"> 
                <label>Time</label>
                <input type="time" name="time" class="form-control input-sm">
                @if ($errors->has('time'))
                    <span class="help-block">
                      <strong>{{ $errors->first('time') }}</strong>
                    </span>
                @endif
              </div>
            </div> 
          </div> 
          <div class="row">
            <div class="col-md-4"> 
              <div class="form-group{{ $errors->has('venue') ? ' has-error' : '' }}"> 
                <label>Venue</label>
               	<input type="text" name="venue" class="form-control input-sm" placeholder="Venue">
                 @if ($errors->has('venue'))
                    <span class="help-block">
                      <strong>{{ $errors->first('venue') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}"> 
                <label>Gender</label>
                <select name="gender" class="form-control">
                  <option></option>
			            <option value="Men">Men</option>
			            <option value="Women">Women</option>
		            </select>
                @if ($errors->has('gender'))
                    <span class="help-block">
                      <strong>{{ $errors->first('gender') }}</strong>
                    </span>
                @endif
              </div>
            </div>
                 
          </div>
          <input type="submit"  class="btn btn-primary" value="ADD">  
        </form>
        </div>
    </div>
  </div>
</div>

<br><br>

<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-hover table-responsive">

          <tr><th>Match No</th>
              <th>Uni 1</th>
              <th>Uni 2</th>
              <th>Sport Group</th>
              <th>Round</th>
              <th>Sport</th>
              <th>Date</th>
	            <th>Time</th>
              <th>Venue</th>
              <th>Gender</th>
	            <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni2}}</td>
              <td>{{$task->SportGroup}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->Sport}}</td>
              <td>{{$task->Date}}</td>  
	            <td>{{$task->Time}}</td>
              <td>{{$task->Venue}}</td>
              <td>{{$task->Gender}}</td>
              <td><a href="/updateEvent/{{$task->MatchNo}}/{{$task->Sport}}" class="btn btn-warning">Edit</a>
                  <a href="/deleteEventSchedule/{{$task->MatchNo}}/{{$task->Sport}}" class="btn btn-danger">Delete</a>
              </td>   
          </tr>
          @endforeach
      </table>
      </div>
    </div>
  </div>
</div>

@endsection
