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
<header class="bg-primary p-4 text-white text-center"><h3>Sports Schedule Add</h3></header>

    <div class="card">
      <div class="card-body">


      <?php //form Validation ?>
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
        @endforeach


        <form action="/saveBaseballSchedule" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-4">
              <label>Sport</label>
              <select name="Sport" class="form-control input-lg dynamic" id="Sport" data-dependent="Group">
                    <option value="">Sport</option>
                    @foreach($Sport as $Sports)
                        <option value="{{$Sports->Sport}}">{{$Sports->Sport}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
              <label>Group</label>
                <select name="Group" class="form-control input-lg dynamic" id="Group" data-dependent="uniID">
                    <option value="">select Group</option> 
                </select>
            </div>
            <div class="col-md-4">
              <label>uniID1</label>
                <select name="uniID1" class="form-control input-lg" id="uniID">
                    <option value="">select UniID1</option>
                </select>
                </div>           
          </div>
         
        <div class="row">
        <div class="col-md-4">
              <label>uniID2</label>
                <select name="uniID2" class="form-control input-lg" id="uniID">
                    <option value="">select UniID2</option>
                </select>
        </div>  
            <div class="col-md-4">
              <label>Date</label>
                <input type="date" name="date" class="form-control input-sm" placeholder="select Date">
            </div>
            <div class="col-md-4">
              <label>Time</label>
                <input type="time" name="time" class="form-control input-sm" placeholder="select Time">
            </div>   
        </div>
        <div class="row">
                <div class="col-md-6">
                <label>Venue</label>
                
                </div> 
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
    <header class="bg-primary p-4 text-white text-center"><h3>Sports Schedule View</h3></header>
      <table class="table table-striped table-dark table-condensed">

          <tr><th>Sport</th>
              <th>Group</th>
              <th>University ID1</th>
              <th>University ID2</th>
              <th>Date</th>
              <th>Time</th>
              <th>Venue</th>
          </tr>
         
      </table>
      </div>
    </div>
  </div>
</div>
</div>
<script> 
         $(document).ready(function(){
                $('.dynamic').change(function(){
                   //console.log($(this).val());
                    if($(this).val() != ''){
                        var select=$(this).attr("id");
                        var value=$(this).val();
                        var dependent = $(this).data('dependent');
                        var _token=$('input[name="_token"]').val();
                        $.ajax({
                            url:"{{route('dynamicdependent1.fetch1')}}",
                            method:"POST",
                            data:{select:select,value:value,
                            _token:_token,dependent:dependent},
                            success:function(result){
                               //console.log(result);
                                $('#'+dependent).html(result);
                                $('#uniID'+dependent).html(result);
                                
                            }
                        })
                        
                    }
                });
            });  
</script>
</body>
</html>
