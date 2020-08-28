<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Result</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
<header class="bg-primary p-4 text-white text-center"><h3>BaseBall Group Add</h3></header>

    <div class="card">
      <div class="card-body">


      <?php //form Validation ?>
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach


        <form action="/saveBaseballGroup" method="post">
          {{csrf_field()}}
          <div class="row">
            
            <div class="col-md-6">
              <label>Group</label>
                <select name="Group" class="form-control input-lg">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option> 
                </select>
            </div> 
            <div class="col-md-6">
              <label>uniID</label>
              <select name="uniID" class="browser-default custom-select">
                    
                        <option value="RUH">RUH</option>
                        <option value="COL">COL</option>
                        <option value="KEL">KEL</option>
                        <option value="JAF">JAF</option>
                </select>
            </div>        
          </div>
        <div class="row"> 
                <div class="col-md-6">
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
    <header class="bg-primary p-4 text-white text-center"><h3>BaseBall Group View</h3></header>
      <table class="table table-striped table-dark table-condensed">

          <tr>
              <th>Group</th>
              <th>UniID</th>
              <th>Action</th>
          </tr>
          @foreach($tasks as $data)
          <tr>
            
              <td>{{$data->Group}}</td>
              <td>{{$data->uniID}}</td>
              <td><a href="#" class="btn btn-danger">Delete</a></td>
           
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
