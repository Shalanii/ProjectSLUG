@extends('welcome')

@section('content')
    <center><h3>Add Taekwondo Results</h3></center>

    <h3>Men's Sparring Results</h3>
    <div class="x">
        <div class="container">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php //form Validation ?>
                        <form action="/saveMensSparringResult" method="post">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                @if(isset($error))
                                    <div class="alert alert-success">
                                        <center><h5>{{$error}}</h5></center>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                                        <label>Date</label>
                                        <input type="date" name="Date"  class="form-control input-sm">
                                        @if ($errors->has('Date'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Date') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Time') ? ' has-error' : '' }}">
                                        <label>Time</label>
                                        <input type="time" name="Time"  class="form-control input-sm">
                                        @if ($errors->has('Time'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Time') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
                                        <label>Match No</label>
                                        <input type="number" name="MatchNo"  class="form-control input-sm" placeholder="Match No" min="0">
                                        @if ($errors->has('MatchNo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
                                        <label>Round</label>
                                        <input type="text" name="Round"  class="form-control input-sm" placeholder="Round">
                                        @if ($errors->has('MatchNo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('WeightCategory') ? ' has-error' : '' }}">
                                        <label>Weight Category</label>
                                        <select name="WeightCategory" class="browser-default custom-select" class="form-control">
                                            <option>Below - 54.0kg</option>
                                            <option>54.0kg - 58.0kg</option>
                                            <option>58.0kg - 63.0kg</option>
                                            <option>63.0kg - 68.0kg</option>
                                            <option>68.0kg - 74.0kg</option>
                                            <option>74.0kg - 80.0kg</option>
                                            <option>80.0kg - 87.0kg</option>
                                            <option>Above 87.0kg</option>
                                        </select>
                                        @if ($errors->has('WeightCategory'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('WeightCategory') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni1') ? ' has-error' : '' }}">
                                        <label>Uni 1</label>
                                        <select name="Uni1" class="browser-default custom-select" class="form-control" >
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni1'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni1') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni1_Player') ? ' has-error' : '' }}">
                                        <label>Uni 1 Player</label>
                                        <select name="Uni1_Player" class="browser-default custom-select" class="form-control">
                                            @foreach($player as $data)
                                                <option>{{$data->Name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni1_Player'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni1_Player') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni1_Score') ? ' has-error' : '' }}">
                                        <label>Uni 1 - Score</label>
                                        <input type="text" name="Uni1_Score"  class="form-control input-sm" placeholder="Uni1 - Score">
                                        @if ($errors->has('Uni1_Score'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni1_Score') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni2') ? ' has-error' : '' }}">
                                        <label>Uni 2</label>
                                        <select name="Uni2" class="browser-default custom-select" class="form-control" >
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni2'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni2') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni2_Player') ? ' has-error' : '' }}">
                                        <label>Uni2 Player</label>
                                        <select name="Uni2_Player" class="browser-default custom-select" class="form-control">
                                            @foreach($player as $data)
                                                <option>{{$data->Name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni2_Player'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Player') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni2_Score') ? ' has-error' : '' }}">
                                        <label>Uni 2 - Score</label>
                                        <input type="text" name="Uni2_Score"  class="form-control input-sm" placeholder="Uni2 - Score">
                                        @if ($errors->has('Uni2_Score'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Score') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('Winner') ? ' has-error' : '' }}">
                                        <label>Winner</label>
                                        <select name="Winner" class="browser-default custom-select" class="form-control">
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Winner'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Winner') }}</strong>
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
    </div>

    <h3>Women's Sparring Results</h3>
    <div class="x">
        <div class="container">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php //form Validation ?>
                        <form action="/saveWomensSparringResult" method="post">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                @if(isset($error))
                                    <div class="alert alert-success">
                                        <center><h5>{{$error}}</h5></center>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                                        <label>Date</label>
                                        <input type="date" name="Date"  class="form-control input-sm">
                                        @if ($errors->has('Date'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Date') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Time') ? ' has-error' : '' }}">
                                        <label>Time</label>
                                        <input type="time" name="Time"  class="form-control input-sm">
                                        @if ($errors->has('Time'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Time') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
                                        <label>Match No</label>
                                        <input type="number" name="MatchNo"  class="form-control input-sm" placeholder="Match No" min="0">
                                        @if ($errors->has('MatchNo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
                                        <label>Round</label>
                                        <input type="text" name="Round"  class="form-control input-sm" placeholder="Round">
                                        @if ($errors->has('MatchNo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Round') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('WeightCategory') ? ' has-error' : '' }}">
                                        <label>Weight Category</label>
                                        <select name="WeightCategory" class="browser-default custom-select" class="form-control">
                                            <option>Below - 46.0kg</option>
                                            <option>46.0kg - 49.0kg</option>
                                            <option>49.0kg - 53.0kg</option>
                                            <option>53.0kg - 57.0kg</option>
                                            <option>57.0kg - 62.0kg</option>
                                            <option>62.0kg - 67.0kg</option>
                                            <option>67.0kg - 73.0kg</option>
                                            <option>Above 73.0kg</option>
                                        </select>
                                        @if ($errors->has('WeightCategory'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('WeightCategory') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni1') ? ' has-error' : '' }}">
                                        <label>Uni 1</label>
                                        <select name="Uni1" class="browser-default custom-select" class="form-control" >
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni1'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni1') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni1_Player') ? ' has-error' : '' }}">
                                        <label>Uni 1 Player</label>
                                        <select name="Uni1_Player" class="browser-default custom-select" class="form-control">
                                            @foreach($playerw as $data)
                                                <option>{{$data->Name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni1_Player'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni1_Player') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni1_Score') ? ' has-error' : '' }}">
                                        <label>Uni 1 - Score</label>
                                        <input type="text" name="Uni1_Score"  class="form-control input-sm" placeholder="Uni1 - Score">
                                        @if ($errors->has('Uni1_Score'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni1_Score') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni2') ? ' has-error' : '' }}">
                                        <label>Uni 2</label>
                                        <select name="Uni2" class="browser-default custom-select" class="form-control" >
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni2'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni2') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni2_Player') ? ' has-error' : '' }}">
                                        <label>Uni2 Player</label>
                                        <select name="Uni2_Player" class="browser-default custom-select" class="form-control">
                                            @foreach($player as $data)
                                                <option>{{$data->Name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni2_Player'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Player') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni2_Score') ? ' has-error' : '' }}">
                                        <label>Uni 2 - Score</label>
                                        <input type="text" name="Uni2_Score"  class="form-control input-sm" placeholder="Uni2 - Score">
                                        @if ($errors->has('Uni2_Score'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni2_Score') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group{{ $errors->has('Winner') ? ' has-error' : '' }}">
                                        <label>Winner</label>
                                        <select name="Winner" class="browser-default custom-select" class="form-control">
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Winner'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Winner') }}</strong>
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
    </div>

    <h3>Individual Poomsae Results</h3>
    <div class="x">
        <div class="container">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php //form Validation ?>
                        <form action="/savePoomsaeIndividualResult" method="post">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                @if(isset($error))
                                    <div class="alert alert-success">
                                        <center><h5>{{$error}}</h5></center>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                                        <label>Date</label>
                                        <input type="date" name="Date"  class="form-control input-sm">
                                        @if ($errors->has('Date'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Date') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Time') ? ' has-error' : '' }}">
                                        <label>Time</label>
                                        <input type="time" name="Time"  class="form-control input-sm">
                                        @if ($errors->has('Time'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Time') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                                        <label>Gender</label>
                                        Men<input type="radio" name="Gender" value="M">
                                        Women<input type="radio" name="Gender" value="W">
                                        @if ($errors->has('MatchNo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Gender') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>



                                <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
                                        <label>Match No</label>
                                        <input type="number" name="MatchNo"  class="form-control input-sm" placeholder="Match No" min="0">
                                        @if ($errors->has('MatchNo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
                                        <label>Round</label>
                                        <input type="text" name="Round"  class="form-control input-sm" placeholder="Round">
                                        @if ($errors->has('Round'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Round') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                                </div>



                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni') ? ' has-error' : '' }}">
                                        <label>Uni</label>
                                        <select name="Uni" class="browser-default custom-select" class="form-control" >
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Player') ? ' has-error' : '' }}">
                                        <label>Player</label>
                                        <select name="Player" class="browser-default custom-select" class="form-control">
                                            @foreach($playermw as $data)
                                                <option>{{$data->Name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Player'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Player') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Score') ? ' has-error' : '' }}">
                                        <label>Score</label>
                                        <input type="number" name="Score" step="0.01" min="0" max="10" class="form-control input-sm" placeholder="Score">
                                        @if ($errors->has('Uni1_Score'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Score') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Rank') ? ' has-error' : '' }}">
                                        <label>Rank</label>
                                        <input type="number" min="1" max="30" name="Rank"  class="form-control input-sm" placeholder="Rank">
                                        @if ($errors->has('Rank'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Rank') }}</strong>
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
    </div>

    <h3>Team Poomsae Results</h3>
    <div class="x">
        <div class="container">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php //form Validation ?>
                        <form action="/savePoomsaeTeamResult" method="post">
                            {{csrf_field()}}
                            <div class="col-md-12">
                                @if(isset($error))
                                    <div class="alert alert-success">
                                        <center><h5>{{$error}}</h5></center>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                                        <label>Date</label>
                                        <input type="date" name="Date"  class="form-control input-sm">
                                        @if ($errors->has('Date'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Date') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Time') ? ' has-error' : '' }}">
                                        <label>Time</label>
                                        <input type="time" name="Time"  class="form-control input-sm">
                                        @if ($errors->has('Time'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Time') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Gender') ? ' has-error' : '' }}">
                                        <label>Gender</label>
                                        Men<input type="radio" name="Gender" value="M">
                                        Women<input type="radio" name="Gender" value="W">
                                        @if ($errors->has('Gender'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Gender') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('MatchNo') ? ' has-error' : '' }}">
                                        <label>Match No</label>
                                        <input type="number" name="MatchNo"  class="form-control input-sm" placeholder="Match No" min="0">
                                        @if ($errors->has('MatchNo'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('MatchNo') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Round') ? ' has-error' : '' }}">
                                        <label>Round</label>
                                        <input type="text" name="Round"  class="form-control input-sm" placeholder="Round">
                                        @if ($errors->has('Round'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Round') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>


                            </div>


                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Uni') ? ' has-error' : '' }}">
                                        <label>Uni</label>
                                        <select name="Uni" class="browser-default custom-select" class="form-control" >
                                            @foreach($uniIDarray as $data)
                                                <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('Uni'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Uni') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Score') ? ' has-error' : '' }}">
                                        <label>Score</label>
                                        <input type="number" name="Score" step="0.01" min="0" max="10" class="form-control input-sm" placeholder="Score">
                                        @if ($errors->has('Uni1_Score'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Score') }}</strong>
                      </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group{{ $errors->has('Rank') ? ' has-error' : '' }}">
                                        <label>Rank</label>
                                        <input type="number" min="1" max="30" name="Rank"  class="form-control input-sm" placeholder="Rank">
                                        @if ($errors->has('Rank'))
                                            <span class="help-block">
                        <strong>{{ $errors->first('Rank') }}</strong>
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
    </div>



    <br><br>

    <div class="x">

<h2>Sparring Results</h2>

        <div class="container">
            <div class="col-sm-12">
                <table class="table table-hover table-responsive">

                    <tr><th>Date</th>
                        <th>Time</th>
                        <th>Gender</th>
                        <th>Match No</th>
                        <th>Round</th>
                        <th>Weight Category</th>
                        <th>Uni 1</th>
                        <th>Uni1_Player</th>
                        <th>Uni1_Score</th>
                        <th>Uni 2</th>
                        <th>Uni2_Player</th>
                        <th>Uni2_Score</th>
                        <th>Winner</th>
                        <th>Action</th>
                    </tr>
                    @if(isset($tasks))
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->Date}}</td>
                                <td>{{$task->Time}}</td>
                                <td>{{$task->Gender}}</td>
                                <td>{{$task->MatchNo}}</td>
                                <td>{{$task->Round}}</td>
                                <td>{{$task->WeightCategory}}</td>
                                <td>{{$task->Uni1}}</td>
                                <td>{{$task->Uni1_Player}}</td>
                                <td>{{$task->Uni1_Score}}</td>
                                <td>{{$task->Uni2}}</td>
                                <td>{{$task->Uni2_Player}}</td>
                                <td>{{$task->Uni2_Score}}</td>
                                <td>{{$task->Winner}}</td>
                                <td><a href="/deleteTeaekwondoSparringResult/{{$task->MatchNo}}/{{$task->Uni1_Player}}/{{$task->Uni2_Player}}/{{$task->Gender}}" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

<h2>Poosae Team Results</h2>

        <div class="container">
            <div class="col-sm-12">
                <table class="table table-hover table-responsive">

                    <tr><th>Date</th>
                        <th>Time</th>
                        <th>Gender</th>
                        <th>Match No</th>
                        <th>Round</th>
                        <th>Uni</th>
                        <th>Player</th>
                        <th>Score</th>
                        <th>Rank</th>
                        <th>Action</th>
                    </tr>
                    @if(isset($taskss))
                        @foreach($taskss as $task)
                            <tr>
                                <td>{{$task->Date}}</td>
                                <td>{{$task->Time}}</td>
                                <td>{{$task->Gender}}</td>
                                <td>{{$task->MatchNo}}</td>
                                <td>{{$task->Round}}</td>
                                <td>{{$task->Uni}}</td>
                                <td>{{$task->PlayerName}}</td>
                                <td>{{$task->Points}}</td>
                                <td>{{$task->Rank}}</td>
                                <td><a href="/deletePoomsaeIndividualResult/{{$task->MatchNo}}/{{$task->PlayerName}}/{{$task->Gender}}" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

<h2>Poosae Individual Results</h2>

        <div class="container">
            <div class="col-sm-12">
                <table class="table table-hover table-responsive">

                    <tr><th>Date</th>
                        <th>Time</th>
                        <th>Gender</th>
                        <th>Match No</th>
                        <th>Round</th>
                        <th>Uni</th>
                        <th>Score</th>
                        <th>Rank</th>
                        <th>Action</th>
                    </tr>
                    @if(isset($tasksss))
                        @foreach($tasksss as $task)
                            <tr>
                                <td>{{$task->Date}}</td>
                                <td>{{$task->Time}}</td>
                                <td>{{$task->Gender}}</td>
                                <td>{{$task->MatchNo}}</td>
                                <td>{{$task->Round}}</td>
                                <td>{{$task->Uni}}</td>
                                <td>{{$task->Points}}</td>
                                <td>{{$task->Rank}}</td>
                                <td><a href="/deletePoomsaeTeamResult/{{$task->MatchNo}}/{{$task->Uni}}/{{$task->Gender}}" class="btn btn-danger btn-sm">Delete</a></td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>

    </div>
@endsection

