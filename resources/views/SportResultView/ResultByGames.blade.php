@extends('welcome')
@section('header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection

@section('content')
<div class="container">       
    <div class="row justify-content-sm-center mb-3">
        <div class="col-sm-8">  
                <div class="card border-primary">
                    <div class="card-header text-center bg-danger" style="color:white;font-weight:bold;">Choose Sport Result</div>
                    <form method="post" action="/View">
      
                    <select class="custom-select" data-style="btn-primary" name="sport">
                       @foreach($d as $data)
                            <option value="{{$data->Sport}}">{{$data->Sport}}</option>
                        @endforeach
                    </select>
                    <br>
                    <input type="submit" name="submit" value="submit" class="btn btn-primary">
                {{csrf_field()}}
            </tr>

        </table>
    </form>
    </div>
    </div>
</div>
</div>
@endsection
