<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller{

    public function viewlistTask(){
        $task = new Task();
        $listTask = $task->getAllTaskJoinUser();
        return view('listTaskBeautiful', compact('listTask'));
    }

    public function insertTask(Request $request){
        $task = new Task();
        $task->insertTask($request);

        return redirect()->route('listTask');
    }

    public function deleteTaskById(Request $request)
    {
        $id = $request->id;
        if ($id == null || $id == '') return redirect()->route('listTask')
            ->with('messageDeleteFail', 'delete this record fail, please try again!');

        $task = new Task();
        $task->deleteTaskById($id);

        $messageDeleteSuccess = 'you have been delete the task create by: ' . auth()->user()->user_name;
        return redirect()->route('listTask')
            ->with('messageDeleteSuccess', $messageDeleteSuccess);
    }

    public function deleteTaskByListId(Request $request)
    {
        $listIdStr = $request->ids;
        $listId = explode(",", $listIdStr);

        if ($listIdStr == null || $listIdStr == '') return redirect()->route('listTask')
            ->with('messageDeleteFail', 'delete this record fail, please try again!');

        $task = new Task();
        $task->deleteTaskByListId($listId);

        $messageDeleteSuccess = 'you have been delete '.sizeof($listId).' tasks create by: ' . auth()->user()->user_name;
        return redirect()->route('listTask')
            ->with('messageDeleteSuccess', $messageDeleteSuccess);
    }

}
