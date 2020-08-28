@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
    <table border="2px" cellpadding="5px">
        <tr>
            <th>Gender</th>
            <th>Category</th>
            <th>Team</th>
            <th>Time</th>
            <th>Rank</th>
        </tr>

        @foreach($r as $item)
            <tr>
                <td>{{$item->Gender}}</td>
                <td>{{$item->MatchCategory}}</td>
                <td>{{$item->Uni}}</td>
                <td>{{$item->Time}}</td>
                <td>{{$item->Rank}}</td>
            </tr>
        @endforeach
    </table>
    <form action="/SavePDF" method="post">
        {{csrf_field()}}
        <input type="hidden" name="hidden" value="{{$view_name}}">
        <input type="submit" name="Submit" value="Download Result as PDF">
    </form>
@endsection
