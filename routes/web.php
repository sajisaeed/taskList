<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/about', function(){
$name ='saji';
$age ='23';
return view('about')->with('name',$name)->with('age',$age);
});
Route::get('tasks', function () {
    $tasks= [
        '1'=>'task 1',
        '2'=>'task 2',
        '3'=> 'task 3',
    ];
    return view('tasks',compact('tasks'));
});
Route::get('/show/{id}', function ($id) {
    $tasks = [
      '1'=>  'task 1',
      '2'=>  'task 2',
      '3'=> 'task 3',
    ];

    $task = $tasks[$id];
    return view('tasks',compact('task'));
});
Route::post('/about', function () {
    $name = $_POST['name'];
    return view('about',compact('name'));
});
Route::get('/tasks' ,function(){
    $tasks = DB::table('tasks')->get();
    return view('tasks',compact('tasks'));
});
Route::get('/task/{id}' ,function($id){
    $task = DB::table('tasks')->find($id);
    return view('task',compact('task'));
});
Route::get('/tasks' ,[TaskController::class,'index'])->name('task.index');
Route::get('/', [TaskController::class,'index'])->name('task.index');
Route::get('/task/{id}', [TaskController::class,'show']);
Route::post('/task/store', [TaskController::class,'store'])->name('task.store');
Route::delete('task/destroy/{id}',[TaskController::class,'destroy'])->name('task.destroy');
