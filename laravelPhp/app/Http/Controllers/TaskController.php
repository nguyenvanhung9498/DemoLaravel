<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller{

    public function viewlistTask(Request $request){
        $currentPage = $request->currentPage;
        if ($currentPage == null || $currentPage == '') {
            $currentPage = 1;
        }

        $offset = $currentPage == 1 ? 0 : ($currentPage - 1) * 5;
        $task = new Task();
        $listTask = $task->getAllTaskJoinUser($offset);
        $totalRecord = $task->totalTask();

        return view('listTaskBeautiful', compact('listTask', 'totalRecord', 'currentPage'));
    }

    public function insertTask(Request $request){
        $task = new Task();
        $task->insertTask($request);

        $messageCreateSuccess = 'you have been create a task';
        return redirect()->route('listTask')
            ->with('messageCreateSuccess', $messageCreateSuccess);
    }

    public function deleteTaskById(Request $request)
    {
        $id = $request->id;
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

        $task = new Task();
        $task->deleteTaskByListId($listId);

        $messageDeleteSuccess = 'you have been delete '.sizeof($listId).' tasks create by: ' . auth()->user()->user_name;
        return redirect()->route('listTask')
            ->with('messageDeleteSuccess', $messageDeleteSuccess);
    }

    public function updateTaskById(Request $request)
    {
        $user = auth()->user();
        $taskUpdate = ['id' => $request->id, 'user_id' => $user->id, 'title' => $request->title
            , 'description' => $request->description, 'status' => $request->status];

        $task = new Task();
        $task->updateTaskById($taskUpdate);
        return 'You have been update success';
    }

    public function getUpdateMessage()
    {
        $messageUpdateSuccess = 'you have been update the task created by: tasks create by: ' . auth()->user()->user_name;
        return redirect()->route('listTask')
            ->with('messageUpdateSuccess', $messageUpdateSuccess);
    }
}
