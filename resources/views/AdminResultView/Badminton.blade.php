@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
<center><h3>Badminton Result View</h3></center>
  <div class="col-sm-12">
    <div class="table-responsive" >
    <table class="table table-hover" >
        <tr>
            <th>Gender</th>
            <th>Round</th>
            <th>Group</th>
            <th>Team - 1</th>
            <th>Matches Won</th>
            <th>Team - 2</th>
            <th>Matches Won</th>
            <th>Winner</th>
            <th>View Detailed Results</th>
        </tr>

        @foreach($r as $item)
            <tr>
                <td>{{$item->Gender}}</td>
                <td>{{$item->Round}}</td>
                <td>{{$item->SportGroup}}</td>
                <td>{{$item->Uni1}}</td>
                <td>{{$item->Uni1_Wins}}</td>
                <td>{{$item->Uni2}}</td>
                <td>{{$item->Uni2_Wins}}</td>
                <td>
                    {{$item->Winner}}
                    </td>

                <td>
                    <form action="/ViewBadmintonDetails" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="hidden" value="{{$item->MatchNo}}">
                        <input type="submit" name="submit" value="See More" class="btn btn-primary">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <form action="/SavePDF" method="post">
        {{csrf_field()}}
        <input type="hidden" name="hidden" value="{{$view_name}}">
        <input type="submit" name="Submit" value="Download Result as PDF">
    </form>
</div>
</div>
@endsection
