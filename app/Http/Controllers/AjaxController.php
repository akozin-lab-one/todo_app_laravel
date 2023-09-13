<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    //userCreatePage
    public function userCreatePage(Request $request){
        logger($request->toArray());
        $data = $this->getTasks($request);

        Task::create($data);

        $response= [
            'message'=>'Add To Task Complete',
            'status'=>'success'
        ];
        return response()->json($response,200);

    }

    //gettask
    private function getTasks(Request $request){
        return[
            'title' => $request->taskTitle,
            'userId' => $request->userId,
            'description' => $request->taskDesc,
            'date' => $request->taskDate,
            'status' => $request->taskStatus
        ];
    }
}
