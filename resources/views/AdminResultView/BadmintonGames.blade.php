@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
    {{--<h2>Match{{$d->MatchNo}}</h2> --}}

    <table border="2px" cellpadding="5px">
        <tr>
            <td colspan="5" align="center">
                    Match : {{$dd->MatchNo}}
                    <br>
                @if($dd->Gender=='M')
                    Male
                    @else
                    Female
                @endif

            </td>
        </tr>
        <tr>
            <th>Category</th>
            <th>Name {{$dd->Uni1}}</th>
            <th>Name {{$dd->Uni2}}</th>
            <th>Final Score</th>
            <th>Winner</th>
        </tr>

        @foreach($d as $item)
            @if($item->MatchCategory=='1st Single' || $item->MatchCategory=='2nd Single' ||$item->MatchCategory=='3rd Single')
        <tr>
            <td>{{$item->MatchCategory}}</td>
            <td>{{$item->Uni1_P1}}</td>
            <td>{{$item->Uni2_P1}}</td>
            <td>{{$item->Uni1_Points}}:{{$item->Uni2_Points}}</td>
            <td>
                @if($item->Uni1_Points>$item->Uni2_Points)
                    {{$item->Uni1}}
                @else
                    {{$item->Uni2}}
                @endif
            </td>
        </tr>
                @else
                <tr>
                    <td>{{$item->MatchCategory}}</td>
                    <td>{{$item->Uni1_P1}} <br>
                        {{$item->Uni1_P2}}
                    </td>
                    <td>{{$item->Uni2_P1}} <br>
                        {{$item->Uni2_P2}}
                    </td>
                    <td>{{$item->Uni1_Points}}:{{$item->Uni2_Points}}</td>
                    <td>
                        @if($item->Uni1_Points>$item->Uni2_Points)
                            {{$item->Uni1}}
                        @else
                            {{$item->Uni2}}
                        @endif
                    </td>
                </tr>
            @endif

        @endforeach
    </table>

        <br><br>
@endsection
