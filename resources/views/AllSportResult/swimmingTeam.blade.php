@extends('welcome')

@section('content')
<div class="container">
  <center><h3>Swimming Team Result Add</h3></center>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form method="post" action="/saveSwimmingTeamResult" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        @if(isset($error))
                            <div class="alert alert-success">
                            <center><h5>{{$error}}</h5></center>       
                            </div>
                        @endif
                    </div>
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
                            <label>Event</label>
                                <div class="form-group{{ $errors->has('Event') ? ' has-error' : '' }}">
                                    <select name="Event" class="form-control" >
                                        <option></option>
                                        <option>4x 100m Freestyle Relay</option>
                                        <option>4x 100m Medleys Relay</option>
                                    </select>
                                    @if ($errors->has('Event'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Event') }}</strong>
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
                                        <option value="Finals">Finals</option>
                                    </select>
                                    @if ($errors->has('Round'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Round') }}</strong>
                                        </span>
                                    @endif
                                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                        <label>UniID2</label>
                            <div class="form-group{{ $errors->has('Uni') ? ' has-error' : '' }}">
                                
                                    <select name="Uni" class="form-control">
                                        <option></option>
                                        @foreach($uniIDarray as $data)
                                        <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('Uni'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Uni') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                        <label>Finish Time</label>
                            <div class="form-group{{ $errors->has('FinishTime') ? ' has-error' : '' }}">
                               
                            <input type="text" name="FinishTime" class="form-control" placholder="player name">
                                    @if ($errors->has('FinishTime'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('FinishTime') }}</strong>
                                        </span>
                                    @endif
                            </div>
                        </div>
                        <div class="col-md-3">
                        <label>Rank</label>
                            <div class="form-group{{ $errors->has('Rank') ? ' has-error' : '' }}">       
                                <input type="number" name="Rank" class="form-control">
                                    @if ($errors->has('Rank'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('Rank') }}</strong>
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
<center><h3>Swimming Team Result View</h3></center>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
    <div class="table-responsive">
      <table class="table table-hover">

          <tr><th>Date</th>
              <th>Gender</th>
              <th>MatchNo</th>
              <th>Event</th>
              <th>Round</th>
              <th>Uni</th>
              <th>FinishTime</th>
              <th>Rank</th>
              <th>Action</th>
          </tr>
          @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->Gender}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Event}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->Uni}}</td>  
	          <td>{{$task->FinishTime}}</td>
              <td>{{$task->Rank}}</td>
              <td>
                  <a href="/deleteSwimmingTeamResult/{{$task->MatchNo}}/{{$task->Event}}/{{$task->Round}}/{{$task->Uni}}" class="btn btn-danger btn-sm">Delete</a></td>  
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