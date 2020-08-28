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

<center><h3>Update Sports Result</h3></center>
<div class="x"> 
<div class="container">
  <div class="col-sm-offset-3 col-sm-6">
    <div class="card">
      <div class="card-body">


      <?php //form Validation ?>
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach


        <form action="/UpdateSports" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col">
              <label>Event ID</label>
                <input type="text" name="eventid"  class="form-control input-sm" placeholder="EventID" value="{{$taskdata->EventID}}"/>
            
            </div>
            <div class="col">
              <label>University ID</label>
                <select name="uniid" class="browser-default custom-select" value="{{$taskdata->UniID}}" >
                  <option name='per'>PER</option>
                   <option name='col'>COL</option>
                  <option name='jap'>JAP</option>
                  <option name='mor'>MOR</option>
                  <option name='kel'>KEL</option>
                  <option name='jaf'>JAF</option>
                  <option name='ruh'>RUH</option>
                  <option name='est'>EST</option>
                  <option name='sab'>SAB</option>
                  <option name='raj'>RAJ</option>
                  <option name='way'>WAY</option>
                  <option name='sea'>SEA</option>
                  <option name='vpa'>VPA</option>
                  <option name='uwa'>UWA</option>
                </select>
            </div>           
          </div>

          <div class="row">
            <div class="col">
              <label>Score</label>
                <input type="text" name="score" class="form-control input-sm" placeholder="Score" value="{{$taskdata->Score}}"/>
            </div>  
            <div class="col"> 
              <label>Result</label> 
                <select name="result" class="browser-default custom-select" value="{{$taskdata->Result}}"/>
                  <option>Win</option>
                  <option>Lost</option>
                  <option>Draw</option>
              </select>
            </div>
          </div>
            <br>
          <button type="submit" class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span></button>
      
        </form>
        </div>
    </div>
  </div>
</div>
</div>


</body>
</html>