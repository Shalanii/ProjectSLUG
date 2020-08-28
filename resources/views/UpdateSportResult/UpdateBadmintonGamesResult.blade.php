@extends('welcome')

@section('content')
<center><h3>Event Schedule Add</h3></center>
    <form method="post" action="/UpdateBadmintonGamesResult">
        {{ csrf_field() }}
        <table cellpadding="2px" align="center">
            <tr>
                <td colspan="2">Gender</td>
                <td colspan="2"><input type="radio" name="gender" value="{{badmintongamesdata->Gender}}">Men
                                <input type="radio" name="gender" value="{{badmintongamesdata->Gender}}">Women</td>
            </tr>

            <tr>
                <td colspan="2">Match Number</td>
                <td  colspan="2"><input type="number" name="matchno" min="1" max="999" value="{{badmintongamesdata->MatchNo}}"></td>
            </tr>

            <tr>
                <td colspan="2">Round</td>
                <td colspan="2"><select name="round" value="{{badmintongamesdata->Round}}">
                        <option value="Preliminary">Preliminary</option>
                        <option value="Quarter Finals">Quarter Finals</option>
                        <option value="Semi Finals">Semi Finals</option>
                        <option value="Consolation Finals">Consolation Finals</option>
                        <option value="Finals">Finals</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td colspan="2">Match Category</td>
                <td colspan="2"><select name="category"value="{{badmintongamesdata->MatchCategory}}">
                        <option value="1st Single">1st Single</option>
                        <option value="2nd Single">2nd Single</option>
                        <option value="3rd Single">3rd Single</option>
                        <option value="1st Double">1st Double</option>
                        <option value="2nd Double">2nd Double</option>
                    </select>
                </td>
            </tr>

            <tr><td colspan="4" height="20"></td></tr>

            <tr><td>University - 1 Name</td>
                <td><select name="uni1" value="{{badmintongamesdata->Uni1}}">
                        @foreach($uniIDarray as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                </td>
                <td>University - 2 Name</td>
                <td><select name="uni2" value="{{badmintongamesdata->Uni2}}">
                        @foreach($uniIDarray as $data)
                            <option value="{{$data->UniID}}">{{$data->UniID}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>Player 1</td>
                <td><input type="text" name="u1p1" size="40" value="{{badmintongamesdata->Uni1_P1}}"></td>
                <td>Player 1</td>
                <td><input type="text" name="u2p1" size="40" value="{{badmintongamesdata->Uni2_P1}}"></td>
            </tr>

            <tr>
                <td>Player 2</td>
                <td><input type="text" name="u1p2" size="40" value="{{badmintongamesdata->Uni1_P2}}"></td>
                <td>Player 2</td>
                <td><input type="text" name="u2p2" size="40" value="{{badmintongamesdata->Uni2_P2}}"></td>
            </tr>

            <tr>
                <td>Points</td>
                <td><input type="number" name="points1" min="0" max="50" value="{{badmintongamesdata->Uni1_Points}}"></td>
                <td>Points</td>
                <td><input type="number" name="points2" min="0" max="50" value="{{badmintongamesdata->Uni2_Points}}"></td>
            </tr>
            <tr>
                <td>Uni1 Result</td>
                <td><select name="uni1Result" value="{{badmintongamesdata->Uni1_Result}}">
                        <option value="Win">Win</option>
                        <option value="Lost">Lost</option>
                        <option value="Draw">Draw</option>
                    </select>
                </td>
                <td>Uni2 Result</td>
                <td><select name="uni2Result" value="{{badmintongamesdata->Uni2_Result}}">
                        <option value="Win">Win</option>
                        <option value="Lost">Lost</option>
                        <option value="Draw">Draw</option>
                    </select>
                </td>
            </tr>


            <tr><td><input type="submit" name="submit" value="Update"></td></tr>
        </table>
    </form>


@endsection