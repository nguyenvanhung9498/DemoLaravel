<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TaskController extends Controller
{

    public function viewlistTask(Request $request)
    {
        $currentPage = $request->currentPage;
        if ($currentPage == null || $currentPage == '') {
            $currentPage = 1;
        }

        $offset = $currentPage == 1 ? 0 : ($currentPage - 1) * 5;
        $task = new Task();
        $listTask = [];
        $totalRecord = 0;
        $nameColumn = $request->sortTask;
        $operator = $request->operatorOrder;
        $searchTask = $request->searchTask;

        //search task
        if ($searchTask) {
            $listTask = $task->searchTask($searchTask, $offset);
            $totalRecord = $task->totalTaskSearch($searchTask);

        //sort task
        } elseif ($nameColumn) {
            $listTask = $task->sortTaskByColumn($nameColumn, $operator, $offset);
            $totalRecord = $task->totalTask();

        } else {
            $listTask = $task->getAllTaskJoinUser($offset);
            $totalRecord = $task->totalTask();
        }

        $sortTask = $request->sortTask;
        return view('listTask', compact('listTask', 'totalRecord'
                , 'currentPage', 'searchTask', 'sortTask', 'operator'));
    }

    public function insertTask(Request $request)
    {
        $task = new Task();
        $task->insertTask($request);

        $listEvidenceParam = $request->file('evidences');
        $listFile = [];
        if ($listEvidenceParam) {
            foreach ($listEvidenceParam as $fileEvidence) {
                $listFile[] = ['filePath' => $fileEvidence->getClientOriginalName(), 'fileType' => $fileEvidence->clientExtension()];
                $fileEvidence->storeAs('public/store/evidence', $fileEvidence->getClientOriginalName());
            }
        }

        $taskIDForInsertEvidence = $task->getTaskIDForInsertEvidence()[0]['id'];
        $listEvidence = ['task_id' => $taskIDForInsertEvidence, 'listFileEvidence' => $listFile];
        $evidence = new Evidence();
        $evidence->insertEvidence($listEvidence);

        $messageCreateSuccess = 'you have been create a task';
        return redirect()->route('listTask')
            ->with('messageCreateSuccess', $messageCreateSuccess);
    }

    public function deleteTask(Request $request)
    {
        $listIdStr = $request->ids;
        $listId = explode(",", $listIdStr);

        $task = new Task();
        $task->deleteTaskByListId($listId);

        $messageDeleteSuccess = 'you have been delete ' . sizeof($listId) . ' tasks create by: ' . auth()->user()->user_name;
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
