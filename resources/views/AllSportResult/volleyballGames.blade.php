@extends('welcome')

@section('content')
<div class="container">
<center><h3>Volleyball Games Result Add</h3></center>
<div class="col-sm-offset-1 col-sm-10">
    <div class="card">
      <div class="card-body">
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach
    <form method="post" action="/saveVolleyballGamesResult">
        {{ csrf_field()}}
        <table cellpadding="2px" align="center">
            <tr>
                <td colspan="2">Gender</td>
                <td colspan="2"><input type="radio" name="Gender" value="M">Men
                    <input type="radio" name="Gender" value="W">Women</td>
            </tr>
            <tr>
                <td colspan="2">Match Number</td>
                <td  colspan="2"><input type="number" name="MatchNo" min="1" max="999"></td>
            </tr>

            <tr>
                <td colspan="2">Round</td>
                <td colspan="2"><select name="Round" class="form-control">
                        <option></option>
                        <option value="Preliminary">Preliminary</option>
                        <option value="Quarter Finals">Quarter Finals</option>
                        <option value="Semi Finals">Semi Finals</option>
                        <option value="Consolation Finals">Consolation Finals</option>
                        <option value="Finals">Finals</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">Match Category</td>
                <td colspan="2"><select name="MatchCategory" class="form-control">
                        <option></option>
                        <option value="1st Match">1st Match</option>
                        <option value="2nd Match">2nd Match</option>
                        <option value="3rd Match">3rd Match</option>
                        <option value="4th Match">4th Match</option>
                        <option value="5th Match">5th Match</option>
                    </select>
                </td>
            </tr>

            <tr><td>University - 1 Name</td>
                <td>
			<select name="uni1" class="form-control">
                            <opton></option>
                        @foreach($uniIDarray as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                </td>
                <td>University - 2 Name</td>
                <td><select name="uni2" class="form-control">
                            <option></option>
                        @foreach($uniIDarray as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Uni1 Points</td>
                <td><input type="number" name="points1" min="0" max="50"></td>
                <td>Uni2 Points</td>
                <td><input type="number" name="points2" min="0" max="50"></td>
            </tr>
            <tr><td><input type="submit" name="submit" value="SAVE"></td></tr>
        </table>
    </form>
    </div>
    </div>
    </div>
    </div>

    <div class="container">
    <center><h3>Volleyball Gemes Result View</h3></center>
  <div class="col-sm-offset-1 col-sm-10">
    <div class="card">
      <div class="card-body">
      <table class="table table-hover">

          <tr>
	     <th>Gender</th>
              <th>Round</th>
              <th>MatchNo</th>
              <th>MatchCategory</th>
              <th>Uni1</th>
	      <th>Uni1_Points</th>
              <th>Uni1_Result</th>
              <th>Uni2</th>
              <th>Uni2_Points</th>
              <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>              <td>{{$task->Gender}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->MatchCategory}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni1_Points}}</td>  
	          <td>{{$task->Uni1_Result}}</td>
	          <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Points}}</td>
              <td>{{$task->Uni2_Result}}</td>
              <td>
                  <a href="/deleteVolleyballGamesResult/{{$task->Gender}}/{{$task->MatchNo}}/{{$task->MatchCategory}}" class="btn btn-sm btn-danger">Delete</a></td>  
          </tr>
          @endforeach
      </table>
      </div>
    </div>
  </div>
</div>


@endsection