<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;
use App\Task;

Route::get('/', function () {
    return view('tasks');
});

Route::post('tasks', function (Request $request) {
    $validator = Validator::make($request->all(), [
'name' => 'required|max:255'
    ]);

    if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

    //dd($request->input('name'));

    $task = Task::create([
        'name' => $request->name
    ]);

    return redirect('/');
});

Route::delete('tasks/{task}', function (Task $task){
    $task->delete();

    return redirect('/');
});