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

<center><h3>Update Notices</h3></center>
<div class="x"> 
<div class="container">
  <div class=" col-sm-12">
    <div class="card">
      <div class="card-body">


      <?php //form Validation ?>
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach
        <form action="/UpdateNotice" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col">
              <label>Date</label>
              <input type="date" name="Date" class="form-control" value="{{notices->Date}}">
            </div>
            <div class="col">
              <label>Time</label>
              <input type="time" name="Time" class="form-control" value="{{notices->Time}}">
            </div>           
          </div>

          <div class="row">
            <div class="col">
              <label>Title</label>
              <textarea name="Title" rows="5" cols="33" class="form-control" value="{{notices->Title}}">
                </textarea>  
            </div>  
            <div class="col"> 
              <label>Notice</label> 
              <textarea name="Notice" rows="5" cols="33" class="form-control" value="{{notices->Notice}}">
                </textarea>  
            </div>
          </div>
          
            <br>
          <button type="submit" class="btn btn-primary"><span class="fas fa-pen"></span>Update Notice </button>
      
        </form>
        </div>
    </div>
  </div>
</div>
</div>
</body>
</html>