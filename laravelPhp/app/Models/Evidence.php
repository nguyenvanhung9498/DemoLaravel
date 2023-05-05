<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evidence extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'evidences';
    protected $dateFormat = 'd-m-Y';

    public  function getEvidenceByTaskID($taskId){
        return $this->where('task_id',$taskId)->get();
    }

    public function totalEvidenceByTaskID($taskID){
        return $this->where('task_id',$taskID)->count();
    }
}
