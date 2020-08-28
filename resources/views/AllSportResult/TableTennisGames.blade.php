@extends('welcome')

@section('content')
<div class="container box">
<center><h3>Table Tennis Games Result Add</h3></center>
<div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach

    <form method="post" action="/saveTableTennisGamesResult">
        {{ csrf_field()}}
        <table class="table table-hover table-sm" align="center">
            <tr>
                <td colspan="2">Gender</td>
                <td colspan="2"><input type="radio" name="Gender" value="M">Men
                    <input type="radio" name="Gender" value="W">Women</td>
            </tr>

            <tr>
                <td colspan="2">Match Number</td>
                <td  colspan="2"><input type="number" name="MatchNo" min="1" max="999" class="form-control"></td>
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
                <td colspan="2"><select name="MatchCategory" class="form-control" id="types">
                        <option></option>
                        <option value="1st Single">1st Single</option>
                        <option value="2nd Single">2nd Single</option>
                        <option value="3rd Single">3rd Single</option>
                        <option value="1st Double">1st Double</option>
                        <option value="2nd Double">2nd Double</option>
                    </select>
                </td>
            </tr>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#types').change(function(){
                        if($('#types').val()=='1st Single' || $('#types').val()=='2nd Single' || $('#types').val()=='3rd Single'){
                            $('#player1').css('display','block');
                            $('#player2').css('display','block');
                        }
                        else if($('#types').val()=='1st Double' || $('#types').val()=='2nd Double'){
                            $('#player1').css('display','block');
                            $('#player2').css('display','block');
                            $('#player3').css('display','block');
                            $('#player4').css('display','block');
                        }
                        else{
                            $('#player1').css('display','none');
                            $('#player2').css('display','none');
                            $('#player3').css('display','none');
                            $('#player4').css('display','none');
                            
                        }
                    });
                });
            </script>
            <tr><td>University - 1 Name</td>
                <td><select name="uni1" class="form-control">
                            <option></option>
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
            <div class="form-group">
                <td>Uni1 Player1</td>
                <td>
                 <select style="display: none;" id="player1" name="u1p1">
                                <option></option>
                                    @foreach($player as $data)
                                    <option value="{{$data->Name}}">{{$data->Name}}</option>
                                    @endforeach
                    </select> 
            
                    </td>
                
            </div>
            <div class="form-group">
                <td>Uni2 Player1</td>
                <td>
                <select style="display: none;" id="player2" name="u2p1">
                                <option></option>
                                    @foreach($player as $data)
                                    <option value="{{$data->Name}}">{{$data->Name}}</option>
                                    @endforeach
                            </select> 
                </td>            
            </div>
            </tr>
            <tr>
                <td>Uni1 Player2</td>
                <td>
                    <select style="display: none;" id="player3" name="u1p2">
                                <option></option>
                                    @foreach($player as $data)
                                    <option value="{{$data->Name}}">{{$data->Name}}</option>
                                    @endforeach
                            </select> 
                </td>
                <td>Uni2 Player2</td>
                <td>
                <select style="display: none;" id="player4" name="u2p2">
                                <option></option>
                                    @foreach($player as $data)
                                    <option value="{{$data->Name}}">{{$data->Name}}</option>
                                    @endforeach
                            </select> 
                </td>
            </tr>
   		 <script>
		$(document).ready(function(){
			$('#player1').select2();
			$('#player2').select2();
			$('#player3').select2();
			$('#player4').select2();
		});
	   </script>

            <tr>
                <td>Uni1 Points</td>
                <td><input type="number" name="points1" min="0" max="50" class="form-control"></td>
                <td>Uni2 Points</td>
                <td><input type="number" name="points2" min="0" max="50" class="form-control"></td>
            </tr>
            <tr><td><input type="submit" name="submit" value="SAVE" class="btn btn-danger"></td></tr>
        </table>
    </form>
    </div>
    </div>
    </div>
    </div>

    <div class="container">
    <center><h3>Table Tennis Games Result View</h3></center>
  <div class="col-sm-12">
      <table class="table table-bordered table-hover table-responsive table-sm">

          <tr><th>Gender</th>
              <th>Round</th>
              <th>MatchNo</th>
              <th>MatchCategory</th>
              <th>Uni1 Player1</th>
              <th>Uni1 Player2</th>
              <th>Uni1</th>
	          <th>Uni1 Points</th>
              <th>Uni2 Player1</th>
	          <th>Uni2 Player2</th>
              <th>Uni2</th>
              <th>Uni2 Points</th>
              <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Gender}}</td>
              <td>{{$task->Round}}</td>
              <td>{{$task->MatchNo}}</td>
              <td>{{$task->MatchCategory}}</td>
              <td>{{$task->Uni1_P1}}</td>
              <td>{{$task->Uni1_P2}}</td>
              <td>{{$task->Uni1}}</td>
              <td>{{$task->Uni1_Points}}</td>  
              <td>{{$task->Uni2_P1}}</td>
              <td>{{$task->Uni2_P2}}</td>  
	          <td>{{$task->Uni2}}</td>
              <td>{{$task->Uni2_Points}}</td>
              <td>
                  <a href="/deleteTableTennisGamesResult/{{$task->MatchNo}}/{{$task->Gender}}/{{$task->MatchCategory}}" class="btn btn-sm btn-danger">Delete</a></td>  
          </tr>
          @endforeach
      </table>
      </div>
</div>


<script>
$(document).ready(function(){

 $('#player_1').keyup(function(){ 
        var query = $(this).val();
        if(query != '')
        {
         var _token = $('input[name="_token"]').val();
         $.ajax({
          url:"{{ route('autocomplete.fetch') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
           $('#playerList').fadeIn();  
                    $('#playerList').html(data);
          }
         });
        }
    });
    $(document).on('click', 'li', function(){  
        $('#player_1').val($(this).text());  
        $('#playerList').fadeOut();  
    });  

});
</script>

@endsection