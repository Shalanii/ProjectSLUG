@extends('welcome')

@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
<div class="container">       
    <div class="row justify-content-sm-center mb-3">
        <div class="col-sm-8">  
                <div class="card border-primary">
                    <div class="card-header text-center bg-primary" style="color:white;font-weight:bold;">Choose Track & Field Result</div>
                        <form method="post" action="/ViewTrackAndFieldResults">
                            {{csrf_field()}}
                            <select name="event" class="form-control">
                                @foreach($ev as $item)
                                    <option>{{$item->Event}}</option>
                                @endforeach
                            </select>
                            <input type="submit" value="Result" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<center><h3>Running Event Result View</h3></center>
<div class="container">
  <div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-hover">
      <tr>
          <td>Gender</td>
          <td>Event</td>
          <td>Round</td>
          <td>University</td>
          <td>Player</td>
          <td>Finish Time</td>
          <td>Rank</td>
      </tr>

      @foreach($r1 as $item)
          <tr>
              <td>{{$item->Gender}}</td>
              <td>{{$item->Event}}</td>
              <td>{{$item->Round}}</td>
              <td>{{$item->Uni}}</td>
              <td>{{$item->PlayerName}}</td>
              <td>{{$item->FinishTime}}</td>
              <td>{{$item->Rank}}</td>
          </tr>
      @endforeach

    </table>
    </div>
    </div>
</div>


<center><h3>Throwing Event Result View</h3></center>
<div class="container">
  <div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-hover">
      <tr>
          <td>Gender</td>
          <td>Event</td>
          <td>Round</td>
          <td>University</td>
          <td>Player</td>
          <td>Distance</td>
          <td>Rank</td>
      </tr>

      @foreach($r2 as $item)
          <tr>
              <td>{{$item->Gender}}</td>
              <td>{{$item->Event}}</td>
              <td>{{$item->Round}}</td>
              <td>{{$item->Uni}}</td>
              <td>{{$item->PlayerName}}</td>
              <td>{{$item->Distance}}</td>
              <td>{{$item->Rank}}</td>
          </tr>
      @endforeach

    </table>
    </div>
    </div>
</div>
<center><h3>Jumping Event Result View</h3></center>
<div class="container">
  <div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-hover">
      <tr>
          <td>Gender</td>
          <td>Event</td>
          <td>Round</td>
          <td>University</td>
          <td>Player</td>
          <td>Height/Distance</td>
          <td>Rank</td>
      </tr>

      @foreach($r3 as $item)
          <tr>
              <td>{{$item->Gender}}</td>
              <td>{{$item->Event}}</td>
              <td>{{$item->Round}}</td>
              <td>{{$item->Uni}}</td>
              <td>{{$item->PlayerName}}</td>
              <td>{{$item->Height_Distance}}</td>
              <td>{{$item->Rank}}</td>
          </tr>
      @endforeach

  </table>
  <form action="/SavePDF2" method="post">
      {{csrf_field()}}
      <input type="hidden" name="hidden" value="{{$view_name}}">
      <input type="submit" name="Submit" value="Download Result as PDF" class="btn btn-danger">
  </form>
  </div>
  </div>
  </div>

 
@endsection
