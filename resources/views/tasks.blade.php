@extends('layouts.app')

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          New Task
        </div>
        <div class="card-body">
        @if(count($errors)>0)
          <div class="alert alert-danger">
            <strong>Whoops, Something went Wrong!</strong>
            <br/>
            <ul>
              @foreach($errors->all() as $error)
                <li>
                  {{ $error }}
                </li>
              @endforeach
            </ul>
          </div>
        @endif
          <form action="/tasks" method="POST">
            @csrf

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="task" class="control-label sr-only">Tasks</label>
                  <input type="text" name="name" id="task-name" class="form-control" placeholder="Task">
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <select name="type" id="type" class="form-control">
                    @foreach(App\TaskType::all() as $type)
                      <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-2">
                <div class="form-group">
                  <button type="submit" class="btn btn-primary btn-block">
                    <span class="fa fa-plus"></span>  Add Task
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div>
    @if(App\Task::all()->isNotEmpty())
      <h2>Tasks:</h2>
      @foreach(App\Task::all() as $task)
        <p>
          {{ $task->name }}
          <span style="color: {{ $task->taskType->color }}">
            {{ $task->taskType->name }}
          </span>
        </p>
        <form action="/tasks/{{ $task->id }}" method="POST">
        @method('DELETE')
        @csrf
          <button type="submit">
            Delete Task
          </button>
        </form>
      @endforeach
    @endif
  </div>
@endsection
