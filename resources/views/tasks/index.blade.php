@extends('app')

@section('content')

    <h3>Create Tasks:</h3>
    {!! Form::open(['url'=>'todo']) !!}
        <div class="form-group">
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter the name of the to do item']) !!}
        </div>

    {!! Form::close() !!}
    <hr/>
    <h3>Tasks List:</h3>
    <div class="form-group"><h4>Show:</h4><a class="btn btn-default" href="/todo" role="button" id="all" value="all">All</a>
        <a class="btn btn-default" href="/todo/Pending" role="button" id="Pending" value="Pending">Pending</a>
        <a class="btn btn-default" href="/todo/Completed" role="button" id="Completed" value="Completed">Completed</a>
    </div><hr/>

    @unless($tasks==null)
            @foreach($tasks as $task)
                <task>
                    @if($task->status=="0")
                        <h4>{{$task->task_name}} </h4><a href="{{action('TasksController@update',[$task->task_name])}}">Finish</a>
                    @endif
                    @if($task->status=="1")
                        <h4 style="text-decoration:line-through">{{$task->task_name}} </h4><a href="{{action('TasksController@update',[$task->task_name])}}">Restart</a>
                    @endif
                    <a href="{{action('TasksController@remove',[$task->task_name])}}">Remove</a>
                </task><hr/>
            @endforeach
    @endunless
@stop

@section('footer')

@stop