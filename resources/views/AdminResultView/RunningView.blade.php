@extends('welcome')

@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
<center><h3>Running Result View</h3></center>
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

        @foreach($r as $item)
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
@endsection
