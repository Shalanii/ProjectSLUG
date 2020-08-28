<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
   
</style>
</head>
<body>
@include('AdminResultView.adminhome')

<center><h3>Notices Add</h3></center>
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
        <form action="/saveNotice" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col">
              <label>Date</label>
              <input type="date" name="Date" class="form-control">
            </div>
            <div class="col">
              <label>Time</label>
              <input type="time" name="Time" class="form-control">
            </div>           
          </div>

          <div class="row">
            <div class="col">
              <label>Title</label>
              <textarea name="Title" rows="5" cols="33" class="form-control" placeholder="Add Title">
                </textarea>  
            </div>  
            <div class="col"> 
              <label>Notice</label> 
              <textarea name="Notice" rows="5" cols="33" class="form-control" placeholder="Add Notice">
                </textarea>  
            </div>
          </div>
          
            <br>
          <button type="submit" class="btn btn-primary"><span class="fas fa-pen"></span>Submit Notice </button>
      
        </form>
        </div>
    </div>
  </div>
</div>
</div>

<br><br>

<div class="x"> 
<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <table class="table table-striped table-responsive">

          <tr><th>Date</th>
              <th>Time</th>
              <th>Title</th>
              <th>Notice</th>
              <th>Action</th>
          </tr>
          @foreach($tasks as $task)
          <tr>
              <td>{{$task->Date}}</td>
              <td>{{$task->Time}}</td>
              <td>{{$task->Title}}</td>
              <td>{{$task->Notice}}</td>  
              <td><a href="/updateNoticeView/{{$task->NoticeID}}" class="btn btn-warning">Update</a>
              <a href="/deleteNotice/{{$task->NoticeID}}" class="btn btn-danger">Delete</a></td>   
          </tr>
          @endforeach
      </table>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>