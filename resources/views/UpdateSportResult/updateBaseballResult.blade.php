@extends('welcome')

@section('content')
<center><h3>Update Baseball Result </h3></center>
<div class="x"> 
<div class="container">
  <div class="col-sm-offset-1 col-sm-10">
    <div class="card">
      <div class="card-body">
      <?php //form Validation ?>

      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach

        <form action="/UpdateBaseballResult" method="post">
          {{csrf_field()}}
          <div class="row">
          <div class="col">
              <label>Date</label>
                <input type="date" name="Date"  class="form-control input-sm" value="{{$baseballdata->Date}}">
            </div>
            <div class="col">
              <label>Time</label>
                <input type="time" name="Time"  class="form-control input-sm" value="{{$baseballdata->Time}}">
            </div>
            <div class="col">
              <label>Match No</label>
                <input type="text" name="MatchNo"  class="form-control input-sm" placeholder="Match No" value="{{$baseballdata->MatchNo}}">
            </div>
          
            <div class="col">
              <label>Round</label>
		          <select name="Round" class="browser-default custom-select" value="{{$baseballdata->Round}}">
			            <option>Preliminary-Round</option>
			            <option>Quarter-final</option>
			            <option>Semi-final</option>
                  <option>Consolation-final</option>
			            <option>Final</option>
		          </select>
            </div>
            <div class="col">
              <label>SportGroup</label>
                <select name="SportGroup" class="browser-default custom-select" value="{{$baseballdata->SportGroup}}">
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
            </div>
          </div>
          <div class="row">
            <div class="col">
                <label>Uni 1</label>
                <select name="Uni1" class="browser-default custom-select" value="{{$baseballdata->Uni1}}">
                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                  @endforeach

                </select>
            </div>  
            <div class="col">
              <label>Uni1 Score</label>
		          <input type="number" name="Uni1_Score" class="form-control input-sm" value="{{$baseballdata->Uni1_Score}}">   
		          </select>
            </div> 
          </div>  
          </div>
          <div class="row">
          <div class="col">
              <label>Uni 2</label>
                <select name="Uni2" class="browser-default custom-select" value="{{$baseballdata->Uni2}}">
                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                  @endforeach

                </select>
            </div>
            <div class="col">
            <label>Uni2 Score</label>
		          <input type="number" name="Uni2_Score" class="form-control input-sm" value="{{$baseballdata->Uni2_Score}}">
            </div>   
            <div class="col"> 
            <label>Winner</label>
            <input type="text" name="Winner" class="form-control input-sm" value="{{$baseballdata->Winner}}">
            </div>
          </div>
          <div class="row">
                <div class="col">
                <br>
                    <input type="submit"  class="btn btn-primary" value="ADD">
                </div>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>
</div>
@endsection
