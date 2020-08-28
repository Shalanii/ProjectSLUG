@extends('welcome')

@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
    <table>
        <tr>
            <td>Gender</td>
            <td>Event</td>
            <td>Round</td>
            <td>University</td>
            <td>Player</td>
            <td>Height/Distance</td>
            <td>Rank</td>
        </tr>

        @foreach($r as $item)
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
@endsection
