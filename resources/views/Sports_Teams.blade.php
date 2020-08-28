@extends('welcome')

@section('content')

        <?php //form Validation ?>
      @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
                {{$error}}
        </div>
      @endforeach
    <form action="/saveSports" method="post">
        {{csrf_field()}}
        <table width="30%">
            <tr>
                <td>Sport</td>
                <td><select name="sport">
                        <option>Netball</option>
                        <option>Volleyball</option>
                        <option>Elle</option>
                        <option>Cricket</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>Number of Men's Teams</td>
                <td><input type="text" name="mens"></td>
            </tr>

            <tr>
                <td>Number of Women's Teams</td>
                <td><input type="text"  name="womens"></td>
            </tr>

            <tr>
                <td><input type="Submit" name="submit"></td>
            </tr>
        </table>
    </form>
@endsection