<?php

namespace App\Http\Controllers;

use App\Enums\TaskStatusEnum;
use App\Models\Tasks;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $status = !$request->field ? '' : (($request->field == 'all') ? '' : $request->field);
        $searchString = $request->input('search') ? : '';
        $data = Tasks::when($status,function ($query) use ($status){
            $query->where('status',$status);
        })->when($searchString,function ($q) use ($searchString) {
            $q->where('title', 'LIKE', "%" . $searchString . "%")
                ->orwhere('description', 'LIKE', "%" . $searchString . "%")
                ->orwhere('due_date', 'LIKE', "%" . $searchString . "%")
                ->orwhere('status', 'LIKE', "%" . $searchString . "%");
        })
            ->orderBy('created_at','asc')
            ->paginate(10);
        return view('welcome',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $status = TaskStatusEnum::cases();
        return view('create_task',['data' => $status]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=> 'required',
            'description' =>'required',
            'status'=> 'required',
            'due_date'=> 'required',
        ]);
        $task['title'] = $request->title;
        $task['description'] = $request->description;
        $task['due_date'] = $request->due_date;
        $task['status'] = $request->status;
        $id = Tasks::create($task)->id;
        return redirect('view/' . $id)->with('message','Task created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        dd($request->all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
        return view('edit', ['data' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title'=> 'required',
            'description' =>'required',
            'status'=> 'required',
            'due_date'=> 'required',
        ]);
        $task = Tasks::find($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect('/view/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $tasks = Tasks::find($id);
        $tasks->delete();
        return redirect('/');
    }
    public function getTaskDetails(Request $request)
    {
        $task = Tasks::find($request->id);
        return view('task_details', ['data' => $task]);
    }
}
