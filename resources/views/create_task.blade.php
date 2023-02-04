<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-primary">
    <div class="container-fluid">
        <h2 style="color: white">Tasks</h2>
        <a href="/" style="text-decoration: none; color: white"><h7>Go to Homepage</h7></a>
    </div>
</nav>
<div class="container mt-1">
@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" >
    <label>{{$error}}</label>
  </div>
@endforeach
@endif
</div>

    <div class="container-fluid">
        <div class="container" style="width: 1200px">
           <div class="container" style="width:1000px;border:0px solid; margin-top: 10px">
               <h5 class="text-center bg-primary" style="padding: 20px"> Task Details</h5>
               <form method="POST" action="store">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"><br>
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="5"></textarea><br>
                    <label>Due Date</label><br>
                    <input type="date" min={{now()}} class="form-control" name="due_date"><br>
                    <label>Status</label>
                    <select class="form-control" name="status"><br>
                        @foreach ($data as $d)
                        <option>{{$d->value}}</option>
                        @endforeach
                    </select>
                    <br>
                  </div>
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit"> Create Task</button>
                </div>
              </form>
           </div>

        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
