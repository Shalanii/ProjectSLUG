@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
    <table border="2px" cellpadding="5px">
        <tr>
            <th>Weight Category</th>
            <th>Round</th>
            <th>University</th>
            <th>Player</th>
            <th>Snatch</th>
            <th>Clean and Jerk</th>
            <th>Total</th>
        </tr>

        @foreach($r as $item)
            <tr>
                <td>{{$item->WeightCategory}}</td>
                <td>{{$item->Round}}</td>
                <td>{{$item->Uni}}</td>
                <td>{{$item->PlayerName}}</td>
                <td>{{$item->Snatch}}</td>
                <td>{{$item->Clean_and_Jerk}}</td>
                <td>{{$item->Total}}</td>
            </tr>
        @endforeach
    </table>
    <form action="/SavePDF" method="post">
        {{csrf_field()}}
        <input type="hidden" name="hidden" value="{{$view_name}}">
        <input type="submit" name="Submit" value="Download Result as PDF">
    </form>
@endsection
