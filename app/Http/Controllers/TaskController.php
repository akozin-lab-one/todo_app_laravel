<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    //userMainPage
    public function userMainPage(){
        $task = Task::where('userId',Auth::user()->id)->get();
        // dd($task->toArray());
        return view('Users.main', compact('task'));
    }

    //deletePage
    public function deleteTask($id){
        // dd($id);
        Task::where('id', $id)->delete();

        return back();
    }
}
