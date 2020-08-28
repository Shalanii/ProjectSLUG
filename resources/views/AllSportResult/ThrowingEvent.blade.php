@extends('welcome')
@section('content')
<center><h3>Throwing Result Add</h3></center>
<div class="x"> 
<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <?php //form Validation ?>
        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{session()->get('message')}}
            </div>
        @endif
        <form action="/saveThrowingResult" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                <label>Date</label>
                  <input type="date" name="Date"  class="form-control input-sm"> 
                    @if($errors->has('Date'))
                      <span class="help-block">
                          <strong>{{ $errors->first('Date') }}</strong>
                      </span>
                    @endif
              </div>
            </div>
          
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Time') ? ' has-error' : '' }}" >
                <label>Time</label>
                <input type="time" name="Time"  class="form-control input-sm">
                    @if($errors->has('Time'))
                      <span class="help-block">
                          <strong>{{ $errors->first('Time') }}</strong>
                      </span>
                    @endif
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                <label>Gender</label>
                <select name="Gender" class="browser-default custom-select" class="form-control">
                  <option></option>
			            <option>M</option>
			            <option>W</option>
		            </select>
                    @if($errors->has('Gender'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Gender') }}</strong>
                    </span>
                    @endif
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Event') ? ' has-error' : '' }}">
                <label>Event</label>
                  <select name="Event" class="browser-default custom-select" class="form-control">
                        <option></option>
                        @foreach($event as $data)
                        <option>{{$data->Event}}</option>
                        @endforeach
                  </select>
                    @if($errors->has('Event'))
                      <span class="help-block">
                          <strong>{{ $errors->first('Event') }}</strong>
                      </span>
                   @endif
              </div>
            </div>
          </div>

          <div class="row">
          <div class="col-md-3">
            <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
              <label>Match No</label>
                <input type="text" name="MatchNo"  class="form-control input-sm" placeholder="Match No">
                    @if($errors->has('MatchNo'))
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
			            <option>Heats</option>
			            <option>Semi-final</option>
			            <option>Final</option>
		          </select>
                @if($errors->has('Round'))
                    <span class="help-block">
                        <strong>{{ $errors->first('Round') }}</strong>
                    </span>
                @endif
            </div>
        </div>

            <div class="col-md-3">
              <div class="form-group{{ $errors->has('Uni') ? ' has-error' : '' }}">
                <label>Uni ID</label>
                  <select name="Uni" class="browser-default custom-select" class="form-control">
                    <option></option>
                      @foreach($uniIDarray as $data)
                        <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                      @endforeach
                  </select>
                      @if($errors->has('Uni'))
                        <span class="help-block">
                          <strong>{{ $errors->first('Uni') }}</strong>
                        </span>
                      @endif
              </div>
            </div>  

            <div class="col-md-3">
              <div class="form-group{{ $errors->has('PlayerName') ? ' has-error' : '' }}">
                <label>Player Name</label>   
                  <select name="PlayerName" class="browser-default custom-select" class="form-control" placeholder="enter player name" >
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
          </div> 

          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('Distance') ? ' has-error' : '' }}">
                <label>Distance</label>
                <input type="text" name="Distance"  class="form-control input-sm" placeholder="distance">
                        @if($errors->has('Distance'))
                          <span class="help-block">
                            <strong>{{ $errors->first('Distance') }}</strong>
                          </span>
                        @endif
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('Rank') ? ' has-error' : '' }}">
                <label>Place</label>
		              <input type="number" name="Rank" class="form-control input-sm">
                    @if($errors->has('Rank'))
                      <span class="help-block">
                        <strong>{{ $errors->first('Rank') }}</strong>
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

<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-hover table-responsive">

          <tr>
              <th>Date</th>
              <th>Time</th>
              <th>Gender</th>
              <th>Event</th>
              <th>MatchNo</th>
              <th>Round</th>
              <th>Uni</th>
              <th>PlayerName</th>
              <th>Distance</th>
              <th>Place</th>
	          <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->Time}}</td>
              <td>{{$task->Gender}}</td>
              <td>{{$task->Event}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->Uni}}</td>  
              <td>{{$task->PlayerName}}</td>
              <td>{{$task->Distance}}</td>
              <td>{{$task->Rank}}</td>
              <td>
                  <a href="/deleteThrowingResult/{{$task->Gender}}/{{$task->Event}}/{{$task->MatchNo}}/{{$task->Uni}}/{{$task->PlayerName}}" class="btn btn-sm btn-danger">Delete</a></td>   
          </tr>
          @endforeach
          
      </table>
      </div>
    </div>
  </div>
</div>

@endsection
