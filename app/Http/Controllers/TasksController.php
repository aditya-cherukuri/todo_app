<?php

namespace App\Http\Controllers;
use App\Http\Requests\AddTaskRequest;
use App\Task;
use App\Http\Controllers\Controller;


class TasksController extends Controller
{
    /*
     * Shows all tasks
    */
    public function index(){
        $tasks = Task::latest()->get();
        return view('tasks.index',compact('tasks'));
    }

    public function filter($filter){
        if($filter=="Completed"){
            $tasks = Task::finished()->get();
            return view('tasks.index',compact('tasks'));
        }elseif($filter=="Pending"){
            $tasks = Task::unfinished()->get();
            return view('tasks.index',compact('tasks'));
        }else{
            return redirect('todo');
        }
    }

    /*
     * Adds new task with default status
     */
    public function store(AddTaskRequest $request){

        $task = new Task;
        $task->task_name=$request->get('name');
        $task->setStatusAttribute("0");
        $task->save();

        return redirect('todo');
    }

    /*
     * Removes task
     */
    public function remove($name){
        $task = Task::where('task_name',$name)->delete();
        if(is_null($task)){
            abort(404);
        }else{
            return redirect('todo');
        }
    }

    /*
     * Changes status of a task
     */
    public function update($name){
        $task = Task::where('task_name',$name)->firstOrFail();
        if(is_null($task)){
            abort(404);
        }else{
            if($task->status=="0"){
                $task->setStatusAttribute("1");
            }else{
                $task->setStatusAttribute("0");
            }
            $task->save();
        }
        return redirect('todo');
    }

}
