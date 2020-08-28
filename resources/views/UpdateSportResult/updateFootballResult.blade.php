@extends('welcome')

@section('content')
<center><h3>Update FootBall Result Add</h3></center>
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

        <form action="/UpdateFootballResult" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col">
              <label>Match No</label>
                <input type="text" name="MatchNo"  class="form-control input-sm" placeholder="Match No" value="{{$footballdata->MatchNo}}">
            </div>
          
            <div class="col">
              <label>Round</label>
              <br>
		          <select name="Round" class="browser-default custom-select" value="{{$footballdata->Round}}">
			            <option>Preliminary-Round</option>
			            <option>Quarter-final</option>
			            <option>Semi-final</option>
			            <option>Final</option>
		          </select>
            </div>
            <div class="col">
              <label>SportGroup</label>
                <select name="SportGroup" class="browser-default custom-select" value="{{$footballdata->SportGroup}}">
                        <option>A</option>
			            <option>B</option>
			            <option>C</option>
			            <option>D</option>
                </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
                <label>Uni 1</label>
                <select name="Uni1" class="browser-default custom-select" value="{{$footballdata->Uni1}}">
                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                  @endforeach

                </select>
            </div>  
            <div class="col">
              <label>Uni1 Score</label>
              <br>
		          <input type="number" name="Uni1_Score" class="form-control input-sm" value="{{$footballdata->Uni1_Score}}">   
		          </select>
            </div>
            <div class="col">
              <label>Uni1 Result</label>
              <br>
		          <select name="Uni1_Result" class="browser-default custom-select" value="{{$footballdata->Uni1_Result}}">
			            <option>Win</option>
			            <option>Lost</option>
			            <option>Draw</option>    
		          </select>
            </div> 
          </div>  
          </div>

          <div class="row">
          <div class="col">
              <label>Uni 2</label>
                <select name="Uni2" class="browser-default custom-select" value="{{$footballdata->Uni2}}">
                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                  @endforeach

                </select>
            </div>
            <div class="col">
            <label>Uni2 Player</label>
              <br>
		      <input type="number" name="Uni2_Score" class="form-control input-sm" value="{{$footballdata->Uni2_Score}}">
            </div>   
            <div class="col"> 
            <label>Uni2 Result</label>
              <br>
		          <select name="Uni2_Result" class="browser-default custom-select" value="{{$footballdata->Uni2_Result}}">
			            <option>Win</option>
			            <option>Lost</option>
			            <option>Draw</option>    
		          </select>
            </div>
          </div>
          <div class="row">
                <div class="col">
                <label>Gender</label>
                <br>
                <select name="Gender" class="browser-default custom-select" value="{{$footballdata->Gender}}">
			            <option>M</option>
			            <option>W</option>
		            </select>
                </div>
                <div class="col">
                <br>
                    <input type="submit"  class="btn btn-primary" value="Update">
                </div>
          </div>
        </form>
        </div>
    </div>
  </div>
</div>
</div>
@endsection
