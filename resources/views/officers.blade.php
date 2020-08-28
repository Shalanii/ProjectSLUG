@include('AdminResultView.adminhome')
@extends('layouts.app')
<style>
.container{
        font-family: 'Lato', sans-serif;
    }
    .avatar{
        border-radius:100%;
        max-width:100px;
    }
    .panel-body{
        background-color:lightblue;
    }
    .panel-heading{
        background-color:#dc3545;
        color:black;
        font-size:18px;
        height:50px;
        font-weight:bold;
        position:relative;
        bottom:10px;
    }
    p{
        color:black;
        font-size:14px;
    }
</style>
<br>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Officers Details</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><b>Officer Name</b> :- {{Auth::guard('officers')->user()->name}}</p>
                    <p><b>Nic   </b>        :- {{Auth::guard('officers')->user()->nic}}</p>
                    <p><b>Birthday </b>    :- {{Auth::guard('officers')->user()->birthday}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
