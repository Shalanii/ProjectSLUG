@extends('welcome')
@section('content')
<center><h3>Update Slug Point Table</h3></center>

<div class="container">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <?php //form Validation ?>
        <form action="/UpdatePointResult" method="post">
          {{csrf_field()}}  
          <div class="row">
            <div class="col-md-4">
            <div class="form-group{{ $errors->has('UniName') ? ' has-error' : '' }}">
                <label>University</label>
                <select name="UniName" class="browser-default custom-select" class="form-control" value='<?php echo $points->UniName; ?>' >
                  
                    <option value="{{$points->UniName}}">{{$points->UniName}}</option>
                  
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
                <label>Mens Points</label>
                <input type="text" name="MensTotal" class="form-control input-sm" value='<?php echo $points->MensTotal; ?>'>   
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
                <label>Womens Points</label>
                <input type="text" name="WomensTotal" class="form-control input-sm" value='<?php echo $points->WomensTotal; ?>'>   
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


@endsection
