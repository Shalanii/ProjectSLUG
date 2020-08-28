@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
    <table border="2px" cellpadding="5px">
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

        @foreach($r1 as $item)
            {
            <tr>
                <td>{{$item->Gender}}</td>
                <td>{{$item->Round}}</td>
                <td>{{$item->SportGroup}}</td>
                <td>{{$item->Uni1}}</td>
                <td>{{$item->Uni1_Wins}}</td>
                <td>{{$item->Uni2}}</td>
                <td>{{$item->Uni2_Wins}}</td>
                <td>
                    @if($item->Uni1_Result=='WON')
                        {{$item->Uni1}}
                    @elseif($item->Uni2_Result=='WON')
                        {{$item->Uni2}}
                    @else
                        Match Draw
                    @endif
                </td>

                <td>
                    <form action="/ViewTableTennisDetails" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="hidden" value="{{$item->MatchNo}}">
                        <input type="submit" name="submit" value="See More">
                    </form>
                </td>
            </tr>
            }
        @endforeach
    </table>
@endsection

