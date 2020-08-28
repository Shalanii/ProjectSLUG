@extends('welcome')

@section('content')

<div class="container">
<center><h3>Karate Kumite Final Games Result Add</h3></center>
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
    <form method="post" action="/saveKarateKumiteFinalResult">
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
            <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                <td>Gender</td>
                <td><input type="radio" name="Gender" value="M">Men
                    <input type="radio" name="Gender" value="W">Women
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
                                              <div class="form-group{{ $errors->has('WeightCategory') ? ' has-error' : '' }}">
                <td>Weight Category</td>
                <td><select name="WeightCategory" class="form-control">
                        <option></option>
                        <option value="-45Kg">-45Kg</option>
                        <option value="-50Kg">-50Kg</option>
                        <option value="-60Kg">-60Kg</option>
                        <option value="-61Kg">-61Kg</option>
                        <option value="-67Kg">-67Kg</option>
                        <option value="-68Kg">-68Kg</option>
                        <option value="+68Kg">+68Kg</option>
                        <option value="-75Kg">-75Kg</option>
                        <option value="-84Kg">-84Kg</option>
                        <option value="+84Kg">+84Kg</option>
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
                <td>University1</td>
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
                <div class="form-group{{ $errors->has('PlayerName1') ? ' has-error' : '' }}">   
                <td>Uni1 PlayerName</td>
                <td>
                    <select name="PlayerName1" id="player1">
                             <option></option>
                        @foreach($player as $data)
                            <option value="{{$data->Name}}">{{$data->Name}}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('PlayerName1'))
                   <span class="help-block">
                        <strong>{{ $errors->first('PlayerName1') }}</strong>
                    </span>
                    @endif
                </td>
                </div>
                            </tr>

        
            <tr><td><input type="submit" name="submit" value="ADD"></td></tr>
        </table>
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
      <table class="table table-sm table table-hover table-responsive">

          <tr><th>Date</th>
              <th>Gender</th>
              <th>Weight Category</th>
              <th>University1</th>
              <th>Uni1 PlayerName </th>
              <th>Action</th>
          </tr>
          @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
             <td>{{$task->Rank}}</td>
              <td>{{$task->Gender}}</td>
              <td>{{$task->WeightCategory}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni1_Player}}</td>
              <td>
                  <a href="/deleteKarateKumiteResult/{{$task->Rank}}" class="btn btn-danger btn-sm">Delete</a></td>  
          </tr>
          @endforeach
          @endif
      </table>
      </div>
    </div>
  </div>
</div>




@endsection