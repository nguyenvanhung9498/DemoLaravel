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

    public function getAllTaskJoinUser($offset)
    {
        return $this->join('users', 'list_task.user_id', 'users.id')
            ->select('list_task.id', 'list_task.title', 'list_task.description'
                , 'list_task.status', 'users.user_name')->skip($offset)->take(5)->get();
    }

    public function searchTask($text, $offset)
    {
        if (str_contains('INPROGRESS', strtoupper($text)) || str_contains('DONE', strtoupper($text))
            || str_contains('OPEN', strtoupper($text)) || str_contains('REVIEW', strtoupper($text))) {

            if (str_contains('OPEN', strtoupper($text))) {
                $text = 1;
            }

            if (str_contains('INPROGRESS', strtoupper($text))) {
                $text = 2;
            }

            if (str_contains('REVIEW', strtoupper($text))) {
                $text = 3;
            }

            if (str_contains('DONE', strtoupper($text))) {
                $text = 4;
            }
            return $this->join('users', 'list_task.user_id', 'users.id')
                ->select('list_task.id', 'list_task.title', 'list_task.description', 'list_task.status', 'users.user_name')
                ->where('list_task.status', $text )
                ->skip($offset)->take(5)->get();
        }

        $textSearch = '%' . $text . '%';
        return $this->join('users', 'list_task.user_id', 'users.id')
            ->select('list_task.id', 'list_task.title', 'list_task.description', 'list_task.status', 'users.user_name')
            ->where('users.user_name', 'like', $textSearch)
            ->orWhere('list_task.title', 'like', $textSearch)
            ->orWhere('list_task.description', 'like', $textSearch)
            ->skip($offset)->take(5)->get();
    }

    public function totalTaskSearch($text)
    {
        if (str_contains('INPROGRESS', strtoupper($text)) || str_contains('DONE', strtoupper($text))
            || str_contains('OPEN', strtoupper($text)) || str_contains('REVIEW', strtoupper($text))) {

            if (str_contains('OPEN', strtoupper($text))) {
                $text = 1;
            }

            if (str_contains('INPROGRESS', strtoupper($text))) {
                $text = 2;
            }

            if (str_contains('REVIEW', strtoupper($text))) {
                $text = 3;
            }

            if (str_contains('DONE', strtoupper($text))) {
                $text = 4;
            }
            return $this->join('users', 'list_task.user_id', 'users.id')
                ->select('list_task.id', 'list_task.title', 'list_task.description', 'list_task.status', 'users.user_name')
                ->where('list_task.status', $text)
                ->count();
        }

        $textSearch = '%' . $text . '%';
        return $this->join('users', 'list_task.user_id', 'users.id')
            ->select('list_task.id', 'list_task.title', 'list_task.description', 'list_task.status', 'users.user_name')
            ->where('users.user_name', 'like', $textSearch)
            ->orWhere('list_task.title', 'like', $textSearch)
            ->orWhere('list_task.description', 'like', $textSearch)->count();
    }

    public function sortTaskByColumn($nameColum, $operator, $offset)
    {
        if ($nameColum == 'creator') {
            $nameColum = 'users.user_name';
        }

        return $this->join('users', 'list_task.user_id', 'users.id')
            ->select('list_task.id', 'list_task.title', 'list_task.description'
                , 'list_task.status', 'users.user_name')->orderBy($nameColum, $operator)->skip($offset)->take(5)->get();
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

    public function deleteTaskByListId($listId)
    {
        return $this->destroy($listId);
    }

    public function updateTaskById($task)
    {
        $today = now();
        $userId = $task['user_id'];
        $title = $task['title'];
        $description = $task['description'];
        $status = $task['status'];
        $id = $task['id'];
        DB::update('update list_task set user_id = ?, title = ?, description = ?, status = ?, updated_at = ? where id = ?'
            , [$userId, $title, $description, $status, $today, $id]);
    }

}
