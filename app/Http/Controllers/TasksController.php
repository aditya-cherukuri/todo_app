<?php

namespace App\Http\Controllers;
use App\Task;
use App\Http\Controllers\Controller;
use Request;


class TasksController extends Controller
{
    //
    public function index(){
        $tasks = Task::latest()->get();
        return view('tasks.index',compact('tasks'));
    }

    public function filter($filter){
        if($filter=="Completed"){
            $tasks = Task::where('status',"1")->get();
            return view('tasks.index',compact('tasks'));
        }elseif($filter=="Pending"){
            $tasks = Task::where('status',"0")->get();
            return view('tasks.index',compact('tasks'));
        }else{
            return redirect('todo');
        }
    }
    public function store(){
        $t = Request::all();

        $input = Request::get('name');
        if(!$input==""){
            $task = new Task;
            $task->task_name=$input;
            $task->status='0';
            $task->save();
        }

        return redirect('todo');

    }
    public function remove($name){
        $task = Task::where('task_name',$name)->delete();
        return redirect('todo');
    }
    public function update($name){
        $task = Task::where('task_name',$name)->first();


        if($task->status=="0"){
            $task->status="1";
        }else{
            $task->status="0";
        }
        $task->save();

        return redirect('todo');
    }

}
