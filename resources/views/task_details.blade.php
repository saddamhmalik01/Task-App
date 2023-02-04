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
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <div class="container-fluid">
        <div class="container" style="width: 1200px">
           <div class="container" style="width:1000px;border:0px solid; margin-top: 10px">
               <h5 class="text-center bg-primary" style="padding: 20px"> Task Details</h5>
               <div class="row">
                <div class="col-8">
                    <label> <b> Task Id :</b> {{$data->id}}</label><br><br>
                    <label> <b> Title :</b> {{$data->title}}</label><br><br>
                    <label> <b> Description :</b> {{$data->description}}</label><br><br>
                </div>
                <div class="col-4">
                    <label> <b> Status :</b> {{$data->status}}</label><br><br>
                    <label> <b> Due Date :</b> {{$data->due_date}}</label><br><br>
                    <label> <b> Created At :</b> {{$data->created_at}}</label><br><br>
                    <label> <b> Updated At :</b> {{$data->updated_at}}</label><br><br>
                </div>
               </div>
           </div>

        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
