<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evidence extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'evidences';
    protected $dateFormat = 'd-m-Y';

    public function getEvidenceByTaskID($taskId)
    {
        return $this->where('task_id', $taskId)->get();
    }

    public function totalEvidenceByTaskID($taskID)
    {
        return $this->where('task_id', $taskID)->count();
    }

    public function insertEvidence($listEvidence)
    {
        $createDate = now();
        $taskID = $listEvidence['task_id'];
        $listFile = $listEvidence['listFileEvidence'];

        for ($i = 0; $i < sizeof($listFile); $i++) {
            DB::insert('insert into evidences(task_id, file_path, file_type, created_at) values (?, ?, ?, ?)'
                , [$taskID, $listFile[$i]['filePath'], $listFile[$i]['fileType'], $createDate]);
        }

    }

    public function updateEvidence($file)
    {
        $today = now();
        $id = $file['id'];
        $filePath = $file['filePath'];
        $fileType = $file['fileType'];

        DB::update('update evidences set file_path = ?, file_type = ?, updated_at = ? where id = ?'
            , [$filePath, $fileType, $today, $id]);
    }
}
