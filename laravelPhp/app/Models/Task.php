<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'list_task';
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

    public function insertTask(Request $request)
    {
        $user_id = auth()->user()->id;
        $title = $request->title;
        $description = $request->description;
        $status = $request->status;
        $createDate = now();

        DB::insert('insert into list_task (user_id, title, description, status, created_at) value (?, ?, ?, ?, ?)'
            , [$user_id, $title, $description, $status, $createDate]);

    }

    public function deleteTaskById($id)
    {
        return $this->destroy($id);
    }

    public function deleteTaskByListId($listId)
    {
        return $this->destroy($listId);
    }

}
