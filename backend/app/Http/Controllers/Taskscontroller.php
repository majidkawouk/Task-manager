<?php

namespace App\Http\Controllers;

use App\Models\Taskmodel;
use Illuminate\Http\Request;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Carbon\Carbon; 
class Taskscontroller extends Controller
{
   public function ShowTasks($id){
    $ta = Taskmodel::where("user_id",$id)->get();
    return $ta;
   }
   public function ShowallTasks(){
    $ta = Taskmodel::all();
    return $ta;
   }
 public function AddTask(Request $request) {
    $description = $request->input("description");
    $user_id = $request->input("user_id");  
    $days = $request->input("days"); 

  
    $deadline = Carbon::now()->addDays($days)->toDateString(); 

    $ta = Taskmodel::create([
        "description" => $description,
        "user_id" => $user_id,
        "state" => 'pending',
        "deadline" => $deadline
    ]);

    return response()->json($ta, 201);
}
   public function RemoveTask($id) {
    $task = Taskmodel::find($id);
    
    if (!$task) {
        return response()->json(['message' => 'Task not found'], 404);
    }

    $task->delete();

    return response()->json(['message' => 'Task deleted successfully']);
}
   public function UpdateTask(request $request,$id){
      $task = Taskmodel::find($id);
      $state = $request->input("state");
      $task->state = $state;
      $task->save();
   }
}
