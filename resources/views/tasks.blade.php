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
            {{ csrf_field() }}

            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="task" class="control-label sr-only">Tasks</label>
                  <input type="text" name="name" id="task-name" class="form-control" placeholder="Task">
                </div>
              </div>
              <div class="col-md-4">
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
      @if(App\Task::all()->isNotEmpty())
      <div class="card mt-4">
        <div class="card-header">
          <table class="table table-striped task-table">
            <thead>
              <th>Task</th>
              <th></th>
            </thead>
          </table>
          <tbody>
            @foreach(App\Task::all() as $task)
            <tr>
              <td>
                {{ $task->name }}
              </td>
              <td class="text-right">
                <form action="/tasks/{{ $task->id }}" method="POST">
                  {!! method_field('delete') !!}
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-sm">
                    Delete
                  </button>
                </form>
              </td>
              </td>
            <td></td>
          </tr>
          @endforeach
          </tbody>
        </div>
      </div>
      @endif
    </div>
  </div>
@endsection
