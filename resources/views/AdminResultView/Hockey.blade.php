@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
<center><h3>Hockey Result View</h3></center>
  <div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th>MatchNo</th>
            <th>Gender</th>
            <th>Group</th>
            <th>Round</th>
            <th>Team</th>
            <th>Score</th>
            <th>Team</th>
            <th>Score</th>
            <th>Winner</th>
        </tr>

        @foreach($r as $item)
            
            <tr>
                <td>{{$item->Gender}}</td>
                <td>{{$item->SportGroup}}</td>
                <td>{{$item->Round}}</td>
                <td>{{$item->Uni1}}</td>
                <td>{{$item->Uni1_Score}}</td>
                <td>{{$item->Uni2}}</td>
                <td>{{$item->Uni2_Score}}</td>
                <td>
                    @if($item->Uni1_Result=='WON')
                        {{$item->Uni1}}
                    @elseif($item->Uni2_Result=='WON')
                        {{$item->Uni2}}
                    @else
                        Match Draw
                    @endif
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
