@extends('welcome')
@include('AdminResultView.adminhome')
@section('content')

    <div class="container">
        <h3 align="center">Import Player Data </h3>
        <br/>
        @if(count($errors)>0)
            <div class="alert alert-danger">
            Upload Validation Error<br><br>
                <ul>
                    @foreach($errors->all() as $error)
                      <li> {{$error}}</li>

                    @endforeach
                </ul>
            </div>
        @endif

        @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{$message}}</strong>
        </div>
        @endif

        <form method="post" enctype="multipart/form-data" action="{{ url('/import_excel/import') }}">
            {{csrf_field()}}
            <div class="form-group">       
                <table class="table">
                    <tr>
                        <td width="40%" align="right"><label>Select File For Upload</label></td>
                        <td width="30%">
                            <input type="file" name="select_file">
                        </td>
                        <td width="30%" align="left">
                            <input type="submit" name="uplaod" class="btn btn-primary" value="Upload">
                        </td>
                    </tr>
                    <tr>
                        <td width="40%" align="right"></td>
                        <td width="30%" ><span class="text-muted">
                                        .xls, .xslx</span>
                        </td>
                        <td width="30%" align="left"></td>
                    </tr>
                </table>
            </div>
        </form>
        
        <br/>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Player Data</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tr>
                        <th>PlayerID</th>
                        <th>Name</th>
                        <th>Sport</th>
                        <th>UniID</th>
                        <th>Nic</th>
                        <th>Gender</th>
                    </tr>
                    
                        @foreach($data as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->Name}}</td>
                            <td>{{$row->Sport}}</td>
                            <td>{{$row->UniID}}</td>
                            <td>{{$row->nic}}</td>
                            <td>{{$row->Gender}}</td>
                        </tr>
                        @endforeach
                    
                    </table>
                </div>
            </div>
        </div> 
    </div>   

@endsection