@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
<center><h3>NetBall Result View</h3></center>
<div class="container">
  <div class="col-sm-12">
    <div class="table-responsive">
    <table class="table table-hover">
        <tr>
            <th>Round</th>
            <th>Group</th>
            <th>Team - 1</th>
            <th>Team - 2</th>
            <th>Result</th>
            <th>Winner</th>
        </tr>

        @foreach($r as $item)
            <tr>
                <td>{{$item->Round}}</td>
                <td>{{$item->SportGroup}}</td>
                <td>{{$item->Uni1}}</td>
                <td>{{$item->Uni2}}</td>
                <td>{{$item->Uni1_Score}}-{{$item->Uni2_Score}}</td>
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
        <input type="submit" name="Submit" value="Download Results as PDF">
    </form>
</div>
</div>
</div>
@endsection
