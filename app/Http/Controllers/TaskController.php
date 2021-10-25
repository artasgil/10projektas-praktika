<?php

namespace App\Http\Controllers;

use App\Task;
use App\Type;
use App\PaginatonSetting;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $tasks = Task::paginate(5);
        $types = Type::all();
        $type_id = $request->type_id;
        $collumnName = $request->collumnName;
        $sortby=$request->sortby;
        $search = $request->search;
        $paginatonsettings = PaginatonSetting::all();

        $paginatonsetting = $request->paginatonsetting;

        if(!$paginatonsetting) {
            $paginatonsetting = 30;
        }

        // if($paginatonsetting == 1) {
        //     $tasks = Task::orderBy($collumnName, $sortby)->get();
        // }else {
        //     $tasks = Task::orderBy($collumnName, $sortby)->paginate($paginatonsetting);
        // }
        // if(!$search) {
        //     $tasks = Task::paginate(5);

        // } else {
            // $tasks = Task::query()->where("title", 'LIKE', "%{$search}%")->orWhere("description", 'LIKE', "%{$search}%")->paginate(10);
        //  }

        if(!$collumnName && !$sortby) {
            $collumnName = 'id';
            $sortby = 'asc';
        }

        if(!$type_id && !$search) {
            if($paginatonsetting == 1) {
                $tasks = Task::orderBy($collumnName, $sortby)->get();
            }
            else {
                $tasks = Task::orderBy($collumnName, $sortby)->paginate($paginatonsetting);
            }
        }
            if($search) {
                if($paginatonsetting == 1) {
                    $tasks = Task::query()->where("title", 'LIKE', "%{$search}%")->orWhere("description", 'LIKE', "%{$search}%")->get();

                }
                else {
                    $tasks = Task::query()->where("title", 'LIKE', "%{$search}%")->orWhere("description", 'LIKE', "%{$search}%")->paginate($paginatonsetting);
                }
            }
            if($type_id) {
                if($paginatonsetting == 1) {
                    $tasks = Task::orderBy($collumnName, $sortby)->where("type_id", $type_id)->get();

            }
            else{
            $tasks = Task::orderBy($collumnName, $sortby)->where("type_id", $type_id)->paginate($paginatonsetting);
            }
        }

            // $tasks = Task::query()->where("title", 'LIKE', "%{$search}%")->orWhere("description", 'LIKE', "%{$search}%")->paginate(10);

        return view("task.index", ["tasks" => $tasks, "paginatonsettings" => $paginatonsettings, 'collumnName' => $collumnName, 'sortby' => $sortby, "types" => $types,"type_id"=> $type_id, "defaultLimit" => $paginatonsetting, "paginatonsettingg" => $paginatonsetting] );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        return view("task.create", ["types" => $types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->title = $request->task_title;
        $task->description = $request->task_description;
        $task->type_id = $request->type_id;

        if($request->has('task_logo'))
        {
            $imageName = time().'.'.$request->task_logo->extension();
            $task->logo = '/images/'.$imageName;
            $request->task_logo->move(public_path('images'), $imageName);

         }else {
            $task->logo = '/images/noimage.png';
        }
        $task->save();

        return redirect()->route("task.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('task.show',["task" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $types = Type::all()->sortBy("title", SORT_REGULAR, true);
        return view('task.edit',["task" => $task, "types"=>$types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate ([
            'task_end_date'=>'after:task_start_date'
        ]);

        $task->title = $request->task_title;
        $task->description = $request->task_description;
        $task->type_id = $request->type_id;
        $task->start_date = $request->task_start_date;
        $task->end_date = $request->task_end_date;

        if($request->has('task_logo'))
        {
            $imageName = time().'.'.$request->task_logo->extension();
            $task->logo = '/images/'.$imageName;
            $request->task_logo->move(public_path('images'), $imageName);

         }else {
            $task->logo = '/images/noimage.png';
        }
        $task->save();

        return redirect()->route("task.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route("task.index");
    }
}
