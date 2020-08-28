<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Album Add</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <style>
      body {
        padding-top: 50px;
      }
      .starter-template {
        padding: 40px 15px;
      text-align: center;
      }
    </style>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
      <button type="button" class="navbar-toggle"data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">Slug Sports Albums</a>
      <div class="nav-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="{{URL::route('create_album_form')}}">Create New Album</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
    </div>
    
      <div class="container">
    
        <div class="starter-template">
      
        <div class="row">
          @foreach($albums as $album)
            <div class="col-lg-3">
              <div class="thumbnail" style="min-height: 514px;">
                <img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}">
                <div class="caption">
                  <h3>{{$album->name}}</h3>
                  <p>{{$album->description}}</p>
                  <p>{{count($album->Photos)}} image(s).</p>
                  <p>Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{date("g:ha",strtotime($album->created_at)) }}</p>
                  <a href="{{route('add_image',array('id'=>$album->id))}}"><button type="button"class="btn btn-primary btn-sm">Add Image</button></a>
                 <a href="{{route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are yousure?')"><button type="button" class="btn btn-danger btn-sm">Delete Album</button></a>
                </div>
              </div>
            </div>
          @endforeach
        </div>
    
      </div><!-- /.container -->
    </div>
    
  </body>
</html>