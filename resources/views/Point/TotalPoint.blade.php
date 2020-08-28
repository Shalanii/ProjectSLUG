@extends('welcome')
@section('content')
<center><h3>ADD Slug Point Table</h3></center>

<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <?php //form Validation ?>
        <form action="/savepointtable" method="post">
          {{csrf_field()}}  
          <div class="row">
            <div class="col-md-4">
            <div class="form-group{{ $errors->has('UniName') ? ' has-error' : '' }}">
                <label>Uni Name</label>
                <select name="UniName" class="browser-default custom-select" class="form-control" >
                    <option></option>
                  @foreach($uniIDarray as $data)
                    <option value="{{$data->UniName}}">{{$data->UniName}}</option>
                  @endforeach
                </select>
                @if ($errors->has('UniName'))
                    <span class="help-block">
                        <strong>{{ $errors->first('UniName') }}</strong>
                    </span>
                @endif
              </div>
            </div>  
            <div class="col-md-4">
              <div class="form-group{{ $errors->has('MensTotal') ? ' has-error' : '' }}">
                <label>Mens Total Point</label>
                <input type="text" name="MensTotal" class="form-control input-sm">   
                </select>
                  @if ($errors->has('MensTotal'))
                      <span class="help-block">
                          <strong>{{ $errors->first('MensTotal') }}</strong>
                      </span>
                  @endif
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group{{ $errors->has('WomensTotal') ? ' has-error' : '' }}">
                <label>Womens Total Point</label>
                <input type="text" name="WomensTotal" class="form-control input-sm">   
                </select>
                  @if ($errors->has('WomensTotal'))
                      <span class="help-block">
                          <strong>{{ $errors->first('WomensTotal') }}</strong>
                      </span>
                  @endif
            </div>
          </div>

          </div> 
              <input type="submit"  class="btn btn-primary" value="ADD">
        </form>
        </div>
    </div>
  </div>
</div>

<div class="container">
<center><h3>Total Point View</h3></center>
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-hover table-responsive">

          <tr><th>University</th>
              <th>Mens Total</th>
              <th>Womens Total</th>
              <th>Total</th>
              <th>Action</th>
          </tr>
          
          @foreach($datas as $task)
          <tr>
              <td>{{$task->UniName}}</td>
              <td>{{$task->MensTotal}}</td>
              <td>{{$task->WomensTotal}}</td>
              <td>{{$task->Total}}</td>
              <td><a href="/UpdatepointView/{{$task->UniName}}" class="btn btn-danger btn-sm">Update Point</a></td>

          </tr>
          @endforeach

      </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
