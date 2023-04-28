<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'list_task';
    public $timestamps = false;
    protected $dateFormat = 'd-m-Y';

    public function getAllTaskJoinUser()
    {
        return $this->join('users', 'list_task.user_id', 'users.id')
            ->select('list_task.id', 'list_task.title', 'list_task.description'
                , 'list_task.status', 'users.user_name')->get();
    }

    public function getTaskByColum($nameColum, $value)
    {
        return $this->where($nameColum, $value)->get();
    }

    public function totalTask()
    {
        return $this->count();
    }

    public function insertTask()
    {
        return $this->count();
    }

}
