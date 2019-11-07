<?php

namespace App\Http\Controllers;

class TasksController extends Controller
{
    public function index () {
      return view('tasks');
    }

    public function store (\Illuminate\Http\Request $request) {
      $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        'name' => 'required|max:255'
      ]);
    
      if ($validator->fails()) {
        return redirect('/start')->withInput()->withErrors($validator);
      }
    
      \App\Task::create([
        'name' => $request->input('name'),
        'task_type_id' => $request->type
      ]);
    
      return redirect('/start');
    }

    public function destroy (\App\Task $task) {
      $task->delete();
    
      return redirect('start');
    }
}
