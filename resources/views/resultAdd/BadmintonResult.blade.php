<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
   
</style>
</head>
<body>


<div class="x"> 
<div class="container">
  <div class=" col-sm-12">
<header class="bg-primary p-4 text-white text-center"><h3>Badminton Result Add</h3></header>

    <div class="card">
      <div class="card-body">


      <?php //form Validation ?>
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach


        <form action="/saveSports" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <label>Match No</label>
                <input type="text" name="MatchNo"  class="form-control input-sm" placeholder="MatchNo">
            </div>
            <div class="col-md-6">
              <label>Round</label>
                <select name="MatchRound" class="browser-default custom-select" >
                    <option value="1stRound">1st Round</option>
                    <option value="2ndRound">2nd Round</option>
                    <option value="3rdRound">3rd Round</option>
                </select>
                </div>
            </div>           
          </div>

        <div class="row">
            <div class="col-md-6">
              <label>Team1 Score</label>
                <input type="text" name="Team1Score" class="form-control input-sm" placeholder="Team1 Score">
            </div>
            <div class="col-md-6">
              <label>Team2 Score</label>
                <input type="text" name="Team2Score" class="form-control input-sm" placeholder="Team2 Score">
            </div>   
        </div>

        <div class="row">
                <div class="col-md-4">
                <label>Winner Team</label>
                <select name="UniID" class="browser-default custom-select" >
                @foreach($uniIDarray as $data)
                    <option value="{{$data->UniName}}">{{$data->UniName}}</option>
                  @endforeach
                </select>
                </div> 
                <div class="col-md-4">
                   
                <label>Gender</label>
                <select name="Gender" class="browser-default custom-select" >
                
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                </select>
                </div>
                <div class="col-md-4">
                  <br>
                  <button type="submit" class="btn btn-primary"><span class="fas fa-pen"></span>ADD</button> 
                </div>
        </div>
        
        </form>
        </div>
    </div>
  </div>
</div>
</div>

<br><br>

<div class="x"> 
<div class="container">
  <div class=" col-sm-12">
    <div class="card">
      <div class="card-body">
    <header class="bg-primary p-4 text-white text-center"><h3>Badminton Result View</h3></header>
      <table class="table table-striped table-dark table-condensed">

          <tr><th>Match No</th>
              <th>Match Round</th>
              <th>University Team1</th>
              <th>Team1 Score</th>
              <th>University Team2</th>
              <th>Team2 Score</th>
              <th>Gender</th>
              <th>Winner Team</th>
          </tr>
         
      </table>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>