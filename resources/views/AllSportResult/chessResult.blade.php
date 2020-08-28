@extends('welcome')

@section('content')
<center><h3>Chess Result Add</h3></center>
<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <?php //form Validation ?>
        <form action="/saveChessResult" method="post">
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
                <input type="date" name="Date"  class="form-control input-sm">
                    @if ($errors->has('Date'))
                      <span class="help-block">
                        <strong>{{ $errors->first('Date') }}</strong>
                      </span>
                    @endif
              </div>
              </div>
              <div class="col-md-3">
              <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">  
              <label>Match No</label>
                <input type="text" name="MatchNo"  class="form-control input-sm" placeholder="Match No">
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
			            <option value="First Round">First Round</option>
			            <option value="Second Round">Second Round</option>
			            <option value="Third Round">Third Round</option>
			            <option value="Fourth Round">Fourth Round</option>
			            <option value="Fifth Round">Fifth Round</option>
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
		              <input type ="text" placeholder="Enter Score" name="Uni1_Score" class="form-control">
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
		              <input type ="text" placeholder="Enter Score" name="Uni2_Score" class="form-control">
                    @if ($errors->has('Uni2_Score'))
                      <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Score') }}</strong>
                      </span>
                    @endif
              </div>
            </div>   
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">  
                <label>Gender</label>
                <select name="Gender" class="browser-default custom-select" class="form-control">
                  <option></option>
			            <option>M</option>
			            <option>W</option>
		            </select>
                    @if ($errors->has('Gender'))
                      <span class="help-block">
                        <strong>{{ $errors->first('Gender') }}</strong>
                      </span>
                    @endif
              </div>
            </div>
          </div>     
        </div>
        <div class="col-md-2">
          <input type="submit" class="btn btn-primary" value="ADD">
      </div>
        </form>
        </div> 
    </div>
  </div>
</div>
<br><br>

<div class="x"> 
<div class="container">
  <div class="col-sm-12">
      <table class="table table-hover table-responsive">

          <tr><th>Date</th>
              <th>Match No</th>
              <th>Round</th>
              <th>Uni 1</th>
              <th>Uni1 Score</th>
              <th>Uni 2</th>
              <th>Uni2 Score</th>
	            <th>Winner</th>
              <th>Gender</th>
	            <th>Action</th>
          </tr>
          @if(isset($tasks))
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni1_Score}}</td>
              <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Score}}</td>  
	            <td>{{$task->Winner}}</td>
              <td>{{$task->Gender}}</td>
              <td><a href="/deleteChessResult/{{$task->MatchNo}}/{{$task->Round}}" class="btn btn-danger btn-sm">Delete</a></td>   
          </tr>
          @endforeach
          @endif
      </table>
    </div>
  </div>
</div>
@endsection
