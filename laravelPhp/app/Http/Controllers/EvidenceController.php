<?php

namespace App\Http\Controllers;

use App\Models\Evidence;
use Illuminate\Http\Request;

class EvidenceController extends Controller
{
    public function viewListEvidence(Request $request)
    {
        $taskID = $request->taskID;
        $evidence = new Evidence();
        $listEvidenceByTaskID = $evidence->getEvidenceByTaskID($taskID);
        $userName = auth()->user()->user_name;
        return view('evidence', compact('listEvidenceByTaskID', 'userName','taskID'));
    }

    public function insertEvidence(Request $request)
    {
        $evidence = new Evidence();
        $taskID = $request->taskID;
        $evidenceParam = $request->file('evidence');
        $file = [];
        $file[] = ['filePath' => $evidenceParam->getClientOriginalName(),
            'fileType' => $evidenceParam->clientExtension()];
        $evidenceUpdate = ['task_id' => $taskID, 'listFileEvidence' => $file];

        $evidence->insertEvidence($evidenceUpdate);
        return redirect('/evidence?taskID='. $taskID)->with('messageAddEvidence', 'You have been insert an evidence for this task!');
    }

    public function updateEvidence(Request $request){
        $evidenceParam = $request->file('evidence');
        $taskID = $request->taskID;
        $id = $request->evidenceID;
        $filePath = $evidenceParam->getClientOriginalName();
        $fileType = $evidenceParam->clientExtension();
        $file = ['id' => $id, 'filePath' => $filePath, 'fileType' => $fileType];

        $evidence = new Evidence();
        $evidence->updateEvidence($file);

        return redirect('/evidence?taskID=' . $taskID)->with('messageUpdateEvidence','Update Evidence Success!');
    }
}
