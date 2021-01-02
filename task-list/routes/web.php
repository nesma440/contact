<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('tasks', function () {
    $tasks = DB::table('tasks')->get();
    return view('tasks', compact('tasks'));

});

Route::get('tasks/show/{id}', function ($id) {
    $task = DB::table('tasks')->find($id);
    //dd ($task);
    return view('show', compact('task'));

});

Route::get('app', function () {
    //$tasks = DB::table('tasks')->get();
    $tasks=Task::all();
    return view('todo', compact('tasks'));
});
Route::post('store', function (Request $request) {
   //  DB::table('tasks')->insert([
   //       'title' => $request->title]);
$task = new Task;
$task->title = $request->title ;
$task->save();
return redirect()->back();
});

Route::get('app', function () {
    $tasks = DB::table('tasks')->orderBy('title','asc')-> get();

    return view('todo', compact('tasks'));
});


Route::post('delete/{id}', function ( $id) {
    $flight = Task::find($id);

    $flight->delete();
     return redirect()->back();
    });
