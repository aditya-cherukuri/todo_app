@extends('app')

@section('content')

    <h3>Create Tasks:</h3>
    {!! Form::open(['url'=>'todo']) !!}
        <div class="form-group">
            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Enter the name of the to do item']) !!}
        </div>

    {!! Form::close() !!}
    @if($errors->any())
        <ul class="alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <hr/>
    <h3>Tasks List:</h3>
    <div class="form-group"><h4>Show:</h4><a class="btn btn-default" href="/todo/show/All" role="button" id="all">All</a>
        <a class="btn btn-default" href="/todo/show/Pending" role="button" id="Pending">Pending</a>
        <a class="btn btn-default" href="/todo/show/Completed" role="button" id="Completed">Completed</a>
    </div><hr/>

    @unless($tasks==null)
            @foreach($tasks as $task)
                <task class="row">

                        @if($task->status=="0")
                            <strong class="col-md-4">{{$task->task_name}} </strong><a href="{{action('TasksController@update',[$task->task_name])}}">Finish</a>
                        @endif
                        @if($task->status=="1")
                            <strong class="col-md-4" style="text-decoration:line-through">{{$task->task_name}} </strong><a href="{{action('TasksController@update',[$task->task_name])}}">Restart</a>
                        @endif
                        <a href="{{action('TasksController@remove',[$task->task_name])}}">Remove</a>

                </task><hr/>
            @endforeach
    @endunless
@stop

@section('footer')

@stop