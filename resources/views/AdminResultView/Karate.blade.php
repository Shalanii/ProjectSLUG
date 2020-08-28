@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
<center><h3>Hockey Result View</h3></center>
<div class="container">
  <div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th>Gender</th>
            <th>Round</th>
            <th>Team</th>
            <th>Score</th>
        </tr>

        @foreach($r1 as $item)
            @if($item->Team_Individual=='T')

            <tr>
                <td>{{$item->Gender}}</td>
                <td>{{$item->Round}}</td>
                <td>{{$item->Uni}}</td>
                <td>{{$item->Points}}</td>
            </tr>
            @endif
        @endforeach
    </table>
    </div>

    <br>
    <div class="table-responsive">
    <table class="table table-hover table-dark">
        <tr>
            <th>Gender</th>
            <th>Round</th>
            <th>Weight Class</th>
            <th>University</th>
            <th>Player</th>
            <th>Score</th>
        </tr>

        @foreach($r1 as $item)
            @if($item->Team_Individual=='I')

                <tr>
                    <td>{{$item->Gender}}</td>
                    <td>{{$item->Round}}</td>
                    <td>{{$item->WeightCategory}}</td>
                    <td>{{$item->Uni}}</td>
                    <td>{{$item->PlayerName}}</td>
                    <td>{{$item->Points}}</td>
                </tr>
            @endif
        @endforeach
    </table>
    </div>

    <br>
    <div class="table-responsive">
    <table class="table table-hover table-dark">
        <tr>
            <th>Gender</th>
            <th>Round</th>
            <th>Weight Class</th>
            <th>University</th>
            <th>Player</th>
            <th>Score</th>
            <th>University</th>
            <th>Player</th>
            <th>Score</th>
            <th>Winner</th>
        </tr>

        @foreach($r2 as $item)
                <tr>
                    <td>{{$item->Gender}}</td>
                    <td>{{$item->Round}}</td>
                    <td>{{$item->WeightCategory}}</td>
                    <td>{{$item->Uni1}}</td>
                    <td>{{$item->Uni1_Player}}</td>
                    <td>{{$item->Uni1_Score}}</td>
                    <td>{{$item->Uni2}}</td>
                    <td>{{$item->Uni2_Player}}</td>
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
    </div>
</div>

@endsection
