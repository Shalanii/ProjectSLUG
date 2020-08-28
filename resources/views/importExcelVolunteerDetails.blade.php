@extends('welcome')

@section('content')

<div class="container">
        <h3 align="center">Import Voluteer Details</h3>
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

        <form method="post" enctype="multipart/form-data" action="{{ url('/importVolunteer/import') }}">
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
                <h3 class="panel-title">Volunteer Data</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                    <tr>
                        <th>Volunteer ID</th>
                        <th>Name</th>
                        <th>Student Registration Number</th>
                        <th>Faculty</th>
                        <th>Commitee</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                        @foreach($data1 as $row)
                        <tr>
                            <td>{{$row->VolunteerID}}</td>
                            <td>{{$row->Name}}</td>
                            <td>{{$row->StudentRegNum}}</td>
                            <td>{{$row->Faculty}}</td>
                            <td>{{$row->Committy}}</td>
                            <td>{{$row->PhoneNumber}}</td>
                            <td>{{$row->Email}}</td>
                            <td>{{$row->Gender}}</td>     
                        </tr>
                        @endforeach
                    
                    </table>
                </div>
            </div>
        </div> 
    </div>   

@endsection