<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MJobsController extends Controller
{
    //
    public function index(){
        return view('JObsview.AddJob');
    }
    public function store(Request $request){
        if(Auth::User()){
            $validated=$request->validate([
                'tasks'=>'required|string|min:1',
            ]);
            $user_id=Auth::User()->id;
            $validated['user_id']=$user_id;
            task::create($validated);
            return redirect()->route('tasks.show');
        }
        return redirect()->route('Auth.signin');
    }
    public function Show(){
        if(Auth::user()){
        $user_id=Auth::User()->id;
        $data=Task::where('user_id',$user_id)->get();
        return view('JObsview.Show',compact('data'));
    }
    return redirect()->route('Auth.signin');
    }
    public function editForm($task_id){
        $user_id = Auth::user()->id;
        $task = Task::where('user_id', $user_id)->where('id', $task_id)->first();
        if(!Gate::allows('edit-task',$task)){
            abort(403, 'Unauthorized action.');
        }
    

        if (!$task) {
            return redirect()->route('tasks.show')->with('error', 'Task not found or unauthorized.');
        }
    
        return view('Jobsview.editForm', compact('task'));
    }
    public function edit(Request $request,$task_id){
        $user_id=Auth::User()->id;
        $data=Task::where('user_id',$user_id)->where('id',$task_id)->first();
        if(!Gate::allows('edit-task',$data)){
            abort(403, 'Unauthorized action.');
        }
      $validate=$request->validate([
        'tasks'=>'required|string|min:1',
      ]);
      $data->tasks=$validate['tasks'];
      $data->save();
      return redirect()->route('tasks.show')->with('success', 'Task updated successfully.');
    }
    public function delete($id){
        $task=Task::find($id);
        $task->delete();
        return redirect()->route('tasks.show')->with('success', 'Task updated successfully.');
    }
}
