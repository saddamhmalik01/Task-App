<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tasks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<nav class="navbar bg-primary">
    <div class="container-fluid">
        <a href="/" style="text-decoration: none; color: white"><h2>Tasks</h2></a>
    </div>
</nav>
    <div class="container-fluid">
        <div class="container" style="width: 1200px">
           <div style="margin-top: 20px;border-radius: 5px; border: 1px solid #718096;">
               <div class="row">
                <div class="col-10">
                <h3 style="padding: 20px">Tasks</h3>
                </div>
                <div class="col-2" style="margin-top: 20px">
                    <a href={{url('create_task')}}>
                    <button type="button" class="btn btn-primary">Create New Task</button>
                    </a>
                </div>
               </div>
            </div>
            <div class="container" style="width: 500px; height:200px; margin-top: 5px">
                <label class="form-control"> <b>Task Filter</b>
                <form method="post" action="/" class="form-inline">
                    @csrf
                    <label> Filter By : </label>
                    <select name="field" class="custom-select" >
                        <option value='all' selected> All </option>
                        <option value="completed"> completed  </option>
                        <option value="in-progress"> progress </option>
                        <option value="pending"> pending </option>
                    </select>
                  <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Apply</button>

                </form>
            </label>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">S.no</th>
                    <th scope="col">Title</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $d)
                <tr>
                    <th scope="row">{{$d->id}}</th>
                    <td>{{$d->title}}</td>
                    <td>{{$d->due_date}}</td>
                    <td class={{($d->due_date < date(now())) ? ($d->status == \App\Enums\TaskStatusEnum::Completed ? 'bg-success': 'bg-danger'): 'bg-success'}}>{{$d->status}}</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"><a href="view/{{$d->id}}" style="text-decoration: none; color: white"> View </a></button>
                        <button type="button" class="btn btn-secondary btn-sm" {{($d->due_date < date(now())) ? ($d->status == \App\Enums\TaskStatusEnum::Completed ? '': 'disabled'): '  '}}><a href="edit/{{$d->id}}" style="text-decoration: none; color: white"> Edit </a></button>
                        <button type="button" class="btn btn-danger btn-sm"><a href="delete/{{$d->id}}" style="text-decoration: none; color: white"> Delete </a></button>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-3">
                </div>
                <div class="col-6">
                    {{$data}}
                </div>
                <div class="col-3">
                </div>
            </div>

        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>
