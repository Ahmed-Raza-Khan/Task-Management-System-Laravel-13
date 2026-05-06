<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskRepository extends BaseRepository implements TaskRepositoryInterface
{
    public function __construct(Task $model)
    {
        parent::__construct($model);
    }

    public function getByUser($userId)
    {
        return $this->model->where('user_id', $userId)->get();
    }
    
    public function getCompleted()
    {
        return $this->model->completed()->get();
    }

    public function getHighPriority()
    {
        return $this->model->highPriority()->get();
    }

    public function markAsCompleted($id)
    {
        return $this->update($id, ['status' => 'completed']);
    }

    public function getByUserPaginated($userId, $perPage = 10)
    {
        return $this->model
            ->where('user_id', $userId)
            ->orderBy('due_date', 'asc')
            ->paginate($perPage);
    }
}