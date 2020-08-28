@extends('welcome')
@section('content')
    <div class="container">
    <form action="/saveOngoingGames" method="post">
                            {{csrf_field()}}
                                    <label>Sport</label>
                                        <select name="Sport" class="form-control" >
                                            <option value="Netball">Netball</option>
                                            <option value="Badminton">Badminton</option>
                                            <option value="Football">Football</option>
                                            <option value="Elle">Elle</option>
                                            <option value="Basketball">Basketball</option>
                                            <option value="Baseball">Baseball</option>
                                            <option value="Volleyball">Volleyball</option>
                                            <option value="Table Tennis">Table Tennis</option>
                                        </select>

                                        <label>Gender</label>

                                        <input type="radio" name="Gender" value="M">Men
                                        <input type="radio" name="Gender" value="W">Women<br>

                                        <label>Match Number</label>
                                        <input type="number" name="MatchNo"  min="0" max="999" class="form-control input-sm" placeholder="Match No" required autofocus>

                                        <label>Round</label>
                                        <select name="Round" class="browser-default custom-select" class="form-control" required autofocus>
                                            <option>Preliminary</option>
                                            <option>Quarter-final</option>
                                            <option>Semi-final</option>
                                            <option>Consolation Final</option>
                                            <option>Final</option>
                                        </select>

                                        <label>Uni 1</label>
                                        <select name="Uni1" class="browser-default custom-select" class="form-control" required autofocus>
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>

                                        <label>Uni1 Score</label>
                                        <input type="number" name="Uni1_Score" class="form-control input-sm" required autofocus>


                                      <label>Uni 2</label>
                                        <select name="Uni2" class="browser-default custom-select" class="form-control" required autofocus>
                                                                                        @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>

                                     <label>Uni2 Score</label>
                                        <input type="number" name="Uni2_Score" class="form-control input-sm" required autofocus>

                                    <input type="submit"  class="btn btn-primary" value="ADD">
    </form>



    <br><br>

    <div class="container">
        <center><h3>Update Ongoing Games</h3></center>
        <div class="col-sm-13">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-responsive">

                        <tr>
                            <th>ID</th>
                            <th>Gender</th>
                            <th>MatchNo</th>
                            <th>Round</th>
                            <th>Uni1</th>
                            <th>Uni1 Score</th>
                            <th>Uni2</th>
                            <th>Uni2 Score</th>
                            <th>Ongoing</th>
                            <th>Action</th>
                        </tr>
                        @if(isset($tasks))
                            @foreach($tasks as $task)
                                <tr>
                                    <form method="post" action="/updateResult">
                                        {{csrf_field()}}
                                    <td><input type="number" name="id" value="{{$task->GameID}}" readonly></td>
                                    <td>{{$task->Gender}}</td>
                                    <td>{{$task->MatchNo}}</td>
                                    <td>{{$task->Round}}</td>
                                    <td>{{$task->Uni1}}</td>


                                    <td><input type="number" name="score1" value="{{$task->Uni1_Score}}" max="100"></td>
                                    <td>{{$task->Uni2}}</td>
                                    <td><input type="number" name="score2" value="{{$task->Uni2_Score}}" max="100"></td>
                                    <td>YES<input type="radio" value="T" name="ong" checked>NO
                                            <input type="radio" name="ong" value="F"></td>
                                            <!-- <td><a href="/updateResult/" class="btn btn-danger btn-sm">Update</a></td> -->
                                        <td><input type="submit" value="Update"></td>
                                    </form>
                                </tr>
                            @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
