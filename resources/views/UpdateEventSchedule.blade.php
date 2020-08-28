
@extends('welcome')

@section('content')
<center><h3>Event Schedule Add</h3></center>
<div class="x"> 
<div class="container">
  <div class="col-sm-offset-3 col-sm-6">
    <div class="card">
      <div class="card-body">
        <form action="/updateEventSchedule" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col">
              <label>Match No</label>
                <input type="text" name="matchno"  class="form-control input-sm" value="{{$taskdata->MatchNo}}" disabled>
            </div>

            <div class="col">
              <label>Uni 1</label>
                <select name="uniid1" class="browser-default custom-select" value="{{$taskdata->Uni1}}">

                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                  @endforeach

                </select>
            </div>
            <div class="col">
              <label>Uni 2</label>
                <select name="uniid2" class="browser-default custom-select" value="{{$taskdata->Uni2}}">

                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                  @endforeach

                </select>
            </div>   
          <div class="col">
              <label>Sport Group</label>
              <br>
		          <select name="group" class="browser-default custom-select" value="{{$taskdata->SportGroup}}">
			          <option>A</option>
			          <option>B</option>
			          <option>C</option>
			          <option>D</option>
		        </select>
            </div>           
          </div>

        <div class="row">
          <div class="col">
              <label>Round</label>
                  <br>
		            <select name="round" value="{{$taskdata->Round}}">
			            <option>Preliminary Round</option>
			            <option>Heats</option>
			            <option>Quarter-Finals</option>
			            <option>Semi Final</option>
			            <option>Final</option>
		            </select>
            </div> 
          
            <div class="col">
                <label>Sport</label>
                <select name="Sport" class="browser-default custom-select" value="{{$taskdata->Sport}}">
                @foreach($sportArray as $data)
                    <option value="{{$data->Sport}}">{{$data->Sport}}</option>
                @endforeach
                </select>
            </div>  

            <div class="col"> 
              <label>Date</label> 
               	<input type="date" name="date" class="form-control input-sm" value="{{$taskdata->Date}}">
            </div>
          </div>
            
          <div class="row">
            <div class="col">
              <label>Time</label>
                <input type="time" name="time" class="form-control input-sm" value="{{$taskdata->Time}}">
              </div>  
            
            <div class="col"> 
                <label>Venue</label>
               	<input type="text" name="venue" class="form-control input-sm" value="{{$taskdata->Venue}}">
            </div>
          </div>
          <div class="row">
                <div class="col">
                  <label>Gender</label>
                <br>
                  <select name="gender" value="{{$taskdata->Gender}}">
			              <option>M</option>
			              <option>W</option>
		              </select>
                </div>
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