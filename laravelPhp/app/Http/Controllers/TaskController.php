<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller{

    public function viewlistTask(){
        $task = new Task();
        $listTask = $task->getAllTaskJoinUser();
//        dd($listTask);
        return view('listTaskBeautiful', compact('listTask'));
    }

    public function insertTask(Request $request){
        $task = new Task();
        $task->insertTask($request);

        return redirect()->route('listTask');
    }


}
